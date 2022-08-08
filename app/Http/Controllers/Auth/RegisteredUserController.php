<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $requestArray = [
            "user_login" => $request->user_login,
            "email"      => $request->email,
            "password"   => $request->password
        ];

        if( $request->type_user_id == \App\Models\TypeUser::PHYSICAL_PERSON) {

            $requestArray["name"] = $request->name;
            $request->validate([
                "name" => 'required|string|max:255',
                "email" => 'required|string|max:255|unique:users',
                "user_login" => 'required|string|max:80',
                "password" => 'required|string|confirmed|max:8'
            ]);
            
            $user = User::create([
                'name'     => $request->name,
                'user_login'   => $request->user_login,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role_id'  => Role::ROLE_CLIENT,
                'type_user_id' => \App\Models\TypeUser::PHYSICAL_PERSON
            ]);
        }

        if( $request->type_user_id == \App\Models\TypeUser::LEGAL_PERSON) {
            
            $requestArray["fantasy_name"] = $request->fantasy_name;
            $request->validate([
                "fantasy_name" => 'required|string|max:255',
                "email" => 'required|string|max:255|unique:users',
                "user_login" => 'required|string|max:80',
                "password" => 'required|string|confirmed|max:8'
            ]);

            $user = User::create([
                'fantasy_name' => $request->fantasy_name,
                'user_login'   => $request->user_login,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
                'role_id'      => Role::ROLE_CLIENT,
                'type_user_id' => \App\Models\TypeUser::LEGAL_PERSON
            ]);
        }

        event(new Registered($user));

        Auth::login($user);
        return redirect()->route('subscriptions.account');
    }
}
