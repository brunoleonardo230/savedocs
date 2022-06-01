<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Plan $plan)
    {
        $plans = $plan->with('features')->get();

        return view('portal.index', compact('plans'));
    }

    public function createSessionPlan(Plan $plan, $urlPlan)
    {
        if (!$plan = $plan->where('url', $urlPlan)->first()) {
            return redirect()->route('portal.index');
        }

        session()->put('plan', $plan);

        return redirect()->route('subscriptions.checkout');
    }
}
