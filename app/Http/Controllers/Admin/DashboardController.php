<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Status,
    User, TypeUser, Ticket
};
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $user;
    private $ticket;

    public function __construct(User $user, Ticket $ticket)
    {
        $this->user = $user;
        $this->ticket = $ticket;
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $countUsersPF = $this->user->where('type_user_id', TypeUser::PHYSICAL_PERSON)->count();
        $countUsersPJ = $this->user->where('type_user_id', TypeUser::LEGAL_PERSON)->count();
        $countCalled =  $this->ticket->count();
        $countCalledFinalized = $this->ticket->where('status_id', Status::TICKET_FINALIZED)->count();

        return view('dashboard', compact('users', 'countUsersPF', 'countUsersPJ', 'countCalled', 'countCalledFinalized'));
    }
}