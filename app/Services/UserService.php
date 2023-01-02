<?php

namespace App\Services;

use App\Models\{
    User, Address, Representative
};
use App\Traits\ValidatorTrait;
use Illuminate\Support\Facades\Hash;

class UserService
{
    use ValidatorTrait;

    public function getUser($id)
    {
        $user = User::find($id);
        if (!$user)
            throw new \Exception("Não foi possível localizar este usuário", 1);
            
        return $user;
    }

    public function getUserList()
    {
        return User::get();
    }

    public function storeOrUpdatePhysicalPerson($request, $userId = NULL, $userInstance = NULL)
    {   
        $user = !is_null($userInstance) ? $userInstance : User::firstOrNew(['id' => $userId]);

        if (!is_null($userId) && !isset($user->id))
            throw new \Exception("Não foi possível localizar este usuário", 1);

        if (!$this->validateCPF($request['cpf']))
            throw new \Exception("O CPF informado não é válido", 1);

        if (User::whereEmail($request['email'])->first() && !isset($user->id))
            throw new \Exception("O E-mail informado está vinculado a outra conta", 1);

        if (!empty($request['addressArray']['zip_code'])) {
            if (isset($user->address_id)) {
                $address = $user->address->update($request['addressArray']);

            } else {
                $address = Address::create($request['addressArray']);
                if (!$address)
                    throw new \Exception("Não foi possível cadastrar o endereço informado", 1);
                    
                $request['address_id'] = $address->id;
            }
        }

        if(!isset($user->id)) {
            $request['password'] = Hash::make('savedocs');
            return $user->create($request);

        } else {
            $user->update($request);

            if (isset($request['role_id'])) {
                $role = \App\Models\Role::find($request['role_id']);
                $user = $user->role()->associate($role);
                $user->save();
            }
        }
    }

    public function storeOrUpdateLegalPerson($request, $userId = NULL, $userInstance = NULL)
    {
        $user = !is_null($userInstance) ? $userInstance : User::firstOrNew(['id' => $userId]);

        if (!is_null($userId) && !isset($user->id))
            throw new \Exception("Não foi possível localizar este usuário", 1);

        if(!$this->validateCNPJ($request['cnpj']))
            throw new \Exception("O CNPJ informado não é válido", 1);

        if(isset($request['representativeArray']) && !empty($request['representativeArray']['name'])) {

            if (isset($user->representative_id)) {
                $representative = $user->representative->update($request['representativeArray']);

            } else {
                $representative = Representative::create($request['representativeArray']);
                if(!$representative)
                    throw new \Exception("Não foi possível cadastrar o endereço informado", 1);
                
                $request['representative_id'] = $representative->id;
            }  
        }

        if (!empty($request['addressArray']['zip_code'])) {
            if (isset($user->address_id)) {
                $address = $user->address->update($request['addressArray']);

            } else {
                $address = Address::create($request['addressArray']);
                if (!$address)
                    throw new \Exception("Não foi possível cadastrar o endereço informado", 1);
                    
                $request['address_id'] = $address->id;
            }
        }

        if(!isset($user->id)) {
            $request['password'] = Hash::make('savedocs');
            return $user->create($request);

        } else {
            $user->update($request);
			
            if (isset($request['role_id'])) {
                $role = \App\Models\Role::find($request['role_id']);
                $user = $user->role()->associate($role);
                $user->save();
            }
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user)
            throw new \Exception("Não foi possível localizar este usuário", 1);

        return $user->delete();
    }

    public function updateAccess($request, $userId = NULL, $userInstance = NULL)
	{
		if (is_null($request['user_login']) || empty($request['user_login']))
            throw new \Exception("Informe um nome para acesso", 1);

        $user = !is_null($userInstance) ? $userInstance : User::firstOrNew(['id' => $userId]);

        if (!is_null($userId) && !isset($user->id))
            throw new \Exception("Não foi possível localizar este usuário", 1);
		
		$data = [
            'user_login' => $request['user_login'],
            'password'   => $request['password'] ? Hash::make($request['password']) : $user->password
        ];
		
        $user->update($data);

		return redirect()
					->route('accounts.show')
					->with('success', 'Seus dados de acesso foram atualizados com sucesso!');
	}
}