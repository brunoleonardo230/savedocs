<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
	/**
	 * @var Role
	 */
	private $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

    public function index()
    {
    	$roles = $this->role->paginate(10);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
	    return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {
	    try {
	    	$this->role->create($request->all());

		    return redirect()
					->route('roles.index')
					->with('success', 'Perfil adicionado com sucesso!');

	    }catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar criação...';

		    flash($message)->error();
		    return redirect()->back()->with('danger', $message);
	    }
    }

    public function show($id)
    {
        return redirect()->route('roles.edit', $id);
    }

    public function edit($id)
    {
    	$role = $this->role->find($id);
	    return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
	    try {

		    $role = $this->role->find($id);
			if (!$role) {
				return redirect()->route('roles.index')
									->with('danger', 'Perfil inexistente!');
			}

		    $role->update($request->all());

		    return redirect()
					->route('roles.index')
					->with('success', 'Perfil atualizado com sucesso!');

	    } catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
		    return redirect()->back()->with('danger', $message);
	    }
    }

    public function destroy($id)
    {
        try {
			$role = $this->role->find($id);
			if (!$role) {
				return redirect()->route('roles.index')
									->with('danger', 'Perfil inexistente!');
			}

			$role->delete();

			return redirect()
						->route('roles.index')
						->with('success', 'Perfil removido com sucesso!');

        }catch (\Exception $e) {
        	$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
        	return redirect()->back()->with('danger', $message);
        }
    }

	public function syncResources(int $role)
	{
		$role = $this->role->find($role);
		$resources = \App\Models\Resource::all(['id', 'name', 'resource']);

		return view('admin.roles.sync-resources', compact('role', 'resources'));
	}

	public function updateSyncResources($role, Request $request)
	{
		try{
			$role = $this->role->find($role);

			$moduleIDs = [];
			if (!empty($request->resources)) {
				foreach ($request->resources as $key => $resource) {
					$moduleID = ( \App\Models\Resource::find($resource) )->module->id;
					array_push($moduleIDs, strval($moduleID));					
				}
			} 

			$role->modules()->sync($moduleIDs);
			$role->resources()->sync($request->resources);

			return redirect()
						->route('roles.resources', $role)
						->with('success', 'Permissões atribuidas com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adição de permissões...';
			return redirect()->back()->with('danger', $message);
		}
	}
}
