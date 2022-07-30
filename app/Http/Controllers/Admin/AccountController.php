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

    public function update(Request $request, $id)
    {
		try{

			DB::beginTransaction();

        	$userRequest = $request->all();

			$user = auth()->user();

			if( $user->type_user_id == TypeUser::LEGAL_PERSON ){
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

	        return redirect()->back()->with('danger', $message);
        }
    }
}
