<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{ DB };

class AccountController extends Controller
{
	private $service;

	public function __construct(UserService $service)
	{
		$this->service = $service;
	}

	public function show()
    {
		$user = auth()->user();
		$roles = \App\Models\Role::all('id', 'name');
		$sectors = \App\Models\Sector::where('is_active', true)->get();
		
		return view('admin.accounts.show', compact('user', 'roles', 'sectors'));
    }

    public function update(Request $request)
    {
		try {
			DB::beginTransaction();

			$user = auth()->user();

        	if($user->type_user_id == \App\Models\TypeUser::PHYSICAL_PERSON)
				$this->service->storeOrUpdatePhysicalPerson($request->all(), NULL, $user);

			if($user->type_user_id == \App\Models\TypeUser::LEGAL_PERSON)
				$this->service->storeOrUpdateLegalPerson($request->all(), NULL, $user);

			DB::commit();
			return redirect()
					->route('accounts.show')
					->with('success', 'Seus dados foram atualizados com sucesso!');

        } catch (\Exception $e) {
			DB::rollBack();
			return redirect()
					->back()
					->withInput()
					->withErrors($request->all())
					->with('danger', $e->getMessage());
        }
    }

	public function updateAccess(Request $request, $id = NULL)
	{
		try {
			DB::beginTransaction();

			$user = auth()->user();

			$this->service->updateAccess($request->all(), NULL, $user);

			DB::commit();
			return redirect()
					->route('accounts.show')
					->with('success', 'Seus dados de acesso foram atualizados com sucesso!');

		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()
					->back()
					->withInput()
					->with('danger', $e->getMessage());
		}		
	}
}
