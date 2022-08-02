<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ DB, Hash };
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\{ User, Role, Address, TypeUser, Representative };
use App\Traits\ValidatorTrait;

class UserController extends Controller
{
	use ValidatorTrait;

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
		try {

			DB::beginTransaction();

			$newUser = $request->all();
			
			if( $request->type_user_id == TypeUser::PHYSICAL_PERSON ){

				if (!$this->validateCPF($request->cpf))
					throw new \Exception("O CPF informado não é válido", 1);				

				if ( User::whereEmail($request->email)->first())
					return redirect()->back()->withErrors( $request );
			}

			if( $request->type_user_id == TypeUser::LEGAL_PERSON ){

				if (!$this->validateCNPJ($request->cnpj))
					throw new \Exception("O CNPJ informado não é válido", 1);

				if( isset($request->representativeArray) && !empty($request->representativeArray['name']) ) {

					if (!$this->validateCPF($request->representativeArray['cpf']))
						throw new \Exception("O CPF informado para o representante não é válido", 1);	

					$representative = Representative::create($request->representativeArray);
					if($representative)
						$newUser['representative_id'] = $representative->id;
				}
				
			}
			
			$newUser['password'] = Hash::make('savedocs');

			if( !empty($request->addressArray['zip_code']) ) {

				$address = Address::create($request->addressArray);
				if($address)
					$newUser['address_id'] = $address->id;

			}


			User::create($newUser);

			DB::commit();
			return redirect()
					->route('users.index')
					->with('success', 'Usuário adicionado com sucesso!');

		} catch (\Exception $e) {
			DB::rollBack();

			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar cadastro...';

			return redirect()->back()
						->withInput()
						->withErrors($request->all())
						->with('danger', $message);
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

			if( $request->type_user_id == TypeUser::PHYSICAL_PERSON && !$this->validateCPF($request->cpf))
				throw new \Exception("O CPF informado não é válido", 1);

			if( $request->type_user_id == TypeUser::LEGAL_PERSON ){

				if (!$this->validateCNPJ($request->cnpj))
					throw new \Exception("O CNPJ informado não é válido", 1);

				if (!$this->validateCPF($request->representativeArray['cpf']))
					throw new \Exception("O CPF informado para o representante não é válido", 1);

				$user->representative->update($request->representativeArray);
			}

			if( !empty($request->addressArray['zip_code']) ) {
				if ($user->address_id) {
					$address = $user->address->update($request->addressArray);
				} else {
					$address = Address::create($request->addressArray);	
					if($address)
						$userRequest['address_id'] = $address->id;
				}

			}

			$user->update($userRequest);

			$role = Role::find($userRequest['role_id']);
			$user = $user->role()->associate($role);
			$user->save();

			DB::commit();

			return redirect()
					->route('users.edit', $id)
					->with('success', 'Usuário atualizado com sucesso!');

        } catch (\Exception $e) {
			
			DB::rollBack();

			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

			return redirect()->back()
					->withInput()
					->withErrors($request->all())
					->with('danger', $message);
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
