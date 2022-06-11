<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = \App\Role::all('id', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        try{
        	$data = $request->all();

        	if($data['password']){

        		$validator = Validator::make($data, [
        			'password' => 'required|string|min:8|confirmed'
		        ]);

        		if($validator->fails())
        			return redirect()->back()->withErrors($validator);

				$data['password'] = bcrypt($data['password']);

	        } else {
        		unset($data['password']);
	        }

			$user = $this->user->find($id);
			$user->update($data);

			$role = \App\Role::find($data['role']);
			$user = $user->role()->associate($role);
			$user->save();

			flash('Usuário atualizado com sucesso!')->success();
			return redirect()->route('users.index');

        }catch (\Exception $e) {
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

	        flash($message)->error();
	        return redirect()->back();
        }
    }
}
