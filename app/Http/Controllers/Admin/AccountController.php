<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ DB, Hash };
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\{ User, Role, Address, TypeUser, Representative };

class AccountController extends Controller
{

    public function show()
    {
		$user = auth()->user();

		$roles = Role::all('id', 'name');
		
		return view('admin.accounts.show', compact('user', 'roles'));
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

        } catch (\Exception $e) {
			
			DB::rollBack();
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

	        return redirect()->back()->with('danger', $message);
        }
    }

	public function destroy($id)
    {
        try {

			$user = User::find($id);
			if (!$user) {
				return redirect()->route('users.index')
									->with('danger', 'Usuário inexistente!');
			}

            $user->delete();

            return redirect()->route('users.index')
								->with('success', 'Usuário removido com sucesso!');

        } catch (\Exception $e) {

			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
			return redirect()->route('users.index')
								->with('danger', $message);
        }
    }
}
