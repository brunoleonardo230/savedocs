<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $users)
    {
        $users = User::all();            

        return view('users.index', compact('users'));

    }

    public function edit($id)
    {
        $users = User::find($id);
        dd($users);      

        return view('users.index', compact('users'));

    }

    
}
