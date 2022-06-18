<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserRequest;
use App\Models\{ User, Role };

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

	public function create()
    {
		$roles = Role::all('id', 'name');

        return view('admin.users.create', compact('roles'));
    }

	public function store(UserRequest $request)
    {
		if( User::whereEmail($request->email)->first() ) {
			return redirect()->back()
							->withErrors( $request );
		}

		try {
			//code...
			DB::beginTransaction();

			$newUser 			 = $request->all();
			$newUser['password'] = Hash::make('savedocs');

			User::create($newUser);

			DB::commit();
			return redirect()
					->route('users.index')
					->with('success', 'Usuário adicionado com sucesso!');

		} catch (\Exception $e) {
			DB::rollBack();

			return redirect()->back()
						->withErrors( $request );
		}
    }

    public function edit($id)
    {
        $user = User::find($id);
		if (!$user) {
			return redirect()
					->route('users.index')
					->with('danger', 'Usuário inexistente!');
		}
		
		$roles = Role::all('id', 'name');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        try{

			DB::beginTransaction();

        	$userRequest = $request->all();

			$user = User::find($id);
			if (!$user) {
				return redirect()->route('users.index')
									->with('danger', 'Usuário inexistente!');
			}

			$user->update($userRequest);

			$role = Role::find($userRequest['role_id']);
			$user = $user->role()->associate($role);
			$user->save();

			DB::commit();

			return redirect()
					->route('users.index')
					->with('success', 'Usuário atualizado com sucesso!');

        }catch (\Exception $e) {
			
			DB::rollBack();
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

	        return redirect()->back()->with('danger', $message);
        }
    }
}
