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
        return User::all();
    }

    public function storeOrUpdatePhysicalPerson($data, $userId = NULL)
    {   
        $user = User::firstOrNew(['id' => $userId]);
        if (!is_null($userId) && !isset($user->id))
            throw new \Exception("Não foi possível localizar este usuário", 1);

        if (!$this->validateCPF($data['cpf']))
            throw new \Exception("O CPF informado não é válido", 1);

        if (User::whereEmail($data['email'])->first() && !isset($user->id))
            throw new \Exception("O E-mail informado está vinculado a outra conta", 1);

        if (!empty($data['addressArray']['zip_code'])) {
            if (isset($user->address_id)) {
                $address = $user->address->update($data['addressArray']);

            } else {
                $address = Address::create($data['addressArray']);
                if (!$address)
                    throw new \Exception("Não foi possível cadastrar o endereço informado", 1);
                    
                $data['address_id'] = $address->id;
            }
        }

        if(!isset($user->id)) {
            $data['password'] = Hash::make('savedocs');
            return $user->create($data);

        } else {
            $user->update($data);

			$role = \App\Models\Role::find($data['role_id']);
			$user = $user->role()->associate($role);
			$user->save();
        }
    }

    public function storeOrUpdateLegalPerson($data, $userId = NULL)
    {
        $user = User::firstOrNew(['id' => $userId]);
        if (!is_null($userId) && !isset($user->id))
            throw new \Exception("Não foi possível localizar este usuário", 1);

        if(!$this->validateCNPJ($data['cnpj']))
            throw new \Exception("O CNPJ informado não é válido", 1);

        if(isset($data['representativeArray']) && !empty($data['representativeArray']['name'])) {

            if(!$this->validateCPF($data['representativeArray']['cpf']))
                throw new \Exception("O CPF informado para o representante não é válido", 1);	

            if (isset($user->representative_id)) {
                $representative = $user->representative->update($data['representativeArray']);

            } else {
                $representative = Representative::create($data['representativeArray']);
                if(!$representative)
                    throw new \Exception("Não foi possível cadastrar o endereço informado", 1);
                
                $data['representative_id'] = $representative->id;
            }  
        }

        if (!empty($data['addressArray']['zip_code'])) {
            if (isset($user->address_id)) {
                $address = $user->address->update($data['addressArray']);

            } else {
                $address = Address::create($data['addressArray']);
                if (!$address)
                    throw new \Exception("Não foi possível cadastrar o endereço informado", 1);
                    
                $data['address_id'] = $address->id;
            }
        }

        if(!isset($user->id)) {
            $data['password'] = Hash::make('savedocs');
            return $user->create($data);

        } else {
            $user->update($data);

			$role = \App\Models\Role::find($data['role_id']);
			$user = $user->role()->associate($role);
			$user->save();
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user)
            throw new \Exception("Não foi possível localizar este usuário", 1);

        return $user->delete();
    }
}