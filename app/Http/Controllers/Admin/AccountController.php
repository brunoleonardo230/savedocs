<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ DB, Hash };
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\{ User, Role, Address, TypeUser, Representative };
use App\Traits\ValidatorTrait;

class AccountController extends Controller
{
	use ValidatorTrait;

	public function show()
    {
		$user = auth()->user();

		$roles = Role::all('id', 'name');
		
		return view('admin.accounts.show', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
		try{

			DB::beginTransaction();

        	$userRequest = $request->all();

			$user = auth()->user();

			if( $user->type_user_id == TypeUser::PHYSICAL_PERSON && !$this->validateCPF($request->cpf))
				throw new \Exception("O CPF informado não é válido", 1);

			if( $user->type_user_id == TypeUser::LEGAL_PERSON ){

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

			DB::commit();

			return redirect()
					->route('accounts.show')
					->with('success', 'Seus dados foram atualizados com sucesso!');

        } catch (\Exception $e) {
			
			DB::rollBack();

			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
			return redirect()->back()
					->withInput()
					->withErrors($request->all())
					->with('danger', $message);
        }
    }

	public function updateAccess(Request $request, $id)
	{
		if (is_null($request->user_login) || empty($request->user_login))
			return redirect()->back()->with('danger', "Erro ao processar atualização..."); 
		
		$user = auth()->user();
		$user->user_login = $request->user_login;
		$user->password   = $request->password ? Hash::make($request->password) : $user->password;

		$user->save();
		return redirect()
					->route('accounts.show')
					->with('success', 'Seus dados de acesso foram atualizados com sucesso!');
	}
}
