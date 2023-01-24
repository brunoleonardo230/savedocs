<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\{ DB };
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
	private $service;

	public function __construct(UserService $service)
	{
		$this->service = $service;
	}

    public function index()
    {
		$users = $this->service->getUserList();

        return view('admin.users.index', compact('users'));
    }

	public function create()
    {
		$roles = \App\Models\Role::all('id', 'name');
		$sectors = \App\Models\Sector::where('is_active', true)->get();
		$companies = \App\Models\User::where('type_user_id', 2)->get();
		
        return view('admin.users.create', compact('roles', 'sectors','companies'));
    }

	public function store(UserRequest $request)
    {
		try {
			DB::beginTransaction();

			if($request->type_user_id == \App\Models\TypeUser::PHYSICAL_PERSON)
				$this->service->storeOrUpdatePhysicalPerson($request->all());

			if($request->type_user_id == \App\Models\TypeUser::LEGAL_PERSON)
				$this->service->storeOrUpdateLegalPerson($request->all());

			DB::commit();
			return redirect()
					->route('users.index')
					->with('success', 'Usuário adicionado com sucesso!');

		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()
					->back()
					->withInput()
					->withErrors($request->all())
					->with('danger', $e->getMessage());
		}
    }

    public function edit($id)
    {
		try {
			$user  = $this->service->getUser($id);
			$roles = \App\Models\Role::all('id', 'name');
			$sectors = \App\Models\Sector::where('is_active', true)->get();

			if($user->company<>null){
				$company  = $this->service->getUser($user->company);
				$company = $company->name;
			}else{
				$company  = '';
			}
        	return view('admin.users.edit', compact('user', 'roles', 'sectors','company'));

		} catch (\Exception $e) {
			return redirect()
					->route('users.index')
					->with('danger', $e->getMessage());
		}
    }

    public function update(UserRequest $request, $id)
    {
        try {
			DB::beginTransaction();

        	if($request->type_user_id == \App\Models\TypeUser::PHYSICAL_PERSON)
				$this->service->storeOrUpdatePhysicalPerson($request->all(), $id);

			if($request->type_user_id == \App\Models\TypeUser::LEGAL_PERSON)
				$this->service->storeOrUpdateLegalPerson($request->all(), $id);

			DB::commit();
			return redirect()
					->route('users.edit', $id)
					->with('success', 'Usuário atualizado com sucesso!');

        } catch (\Exception $e) {
			DB::rollBack();
			return redirect()
					->back()
					->withInput()
					->withErrors($request->all())
					->with('danger', $e->getMessage());
        }
    }

	public function destroy($id)
    {
        try {
			$this->service->delete($id);
            return redirect()->route('users.index')
								->with('success', 'Usuário removido com sucesso!');

        } catch (\Exception $e) {
			return redirect()->route('users.index')
								->with('danger', $e->getMessage());
        }
    }
}
