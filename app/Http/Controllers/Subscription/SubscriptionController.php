<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Support\Facades\{ DB };
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Models\Plan;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->middleware(['auth']);
        $this->service = $service;
    }

    public function index()
    {
        if (auth()->user()->subscribed('default'))
            return redirect()->route('subscriptions.premium');

        return view('subscriptions.index', [
            'intent' => auth()->user()->createSetupIntent(),
            'plan' => session('plan')
        ]);
    }

    public function store(Request $request)
    {
        $plan = session('plan');
        $user = auth()->user();

        $ticket['ticket_remote'] = $plan->ticket_remote;
        $ticket['ticket_in_person'] = $plan->ticket_in_person;

        $user->update($ticket);

        $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }

    public function premium()
    {
        return view('subscriptions.premium');
    }

    public function account(Plan $plan)
    {
        $user = auth()->user();

        $invoices = $user->invoices();

        $subscription = $user->subscription('default');

        $plans = $plan->with('features')->get();

        return view('subscriptions.account', compact('invoices', 'user', 'subscription','plans'));
    }

    public function downloadInvoice($invoiceId)
    {
        return Auth::user()
                    ->downloadInvoice($invoiceId, [
                        'vendor' => config('app.name'),
                        'product' => 'Assinatura VIP'
                    ]);
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();

        return redirect()->route('subscriptions.account');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();

        return redirect()->route('subscriptions.account');
    }
}
