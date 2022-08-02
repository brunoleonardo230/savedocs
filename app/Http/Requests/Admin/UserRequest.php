<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TypeUser;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->type_user_id == TypeUser::PHYSICAL_PERSON) {
            $data = [
                'name' => 'required|string|max:255',
	            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('user'),
	            'cpf' => 'required|string',
	            'phone' => 'required|string'
            ];
        }

        if ($this->type_user_id == TypeUser::LEGAL_PERSON) {
            $data = [
                'fantasy_name' => 'required|string|max:255',
                'cnpj' => 'required|string',
                'representativeArray.name' => 'required|string|max:255',
                'representativeArray.email' => 'required|string|email|max:255|unique:users,email,' . $this->route('user'),
	            'representativeArray.cpf' => 'required|string',
	            'representativeArray.phone' => 'required|string'
            ];
        }
        
        if (isset($this->addressArray['zip_code']) && !empty($this->addressArray['zip_code'])) {
            $data += [
                'addressArray.zip_code' => 'required|string',
                'addressArray.address' => 'required|string',
                'addressArray.number' => 'required|numeric',
                'addressArray.complement' => 'required|string',
                'addressArray.neighborhood' => 'required|string',
                'addressArray.city' => 'required|string',
                'addressArray.state' => 'required|string'
            ];
        }

        $data += ['user_login' => 'required|string'];
        
        return $data;
    }
}
