<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ModuleRequest;
use App\Models\{ Module, Resource };

class ModuleController extends Controller
{

	private $module;

	public function __construct(Module $module)
	{
		$this->module = $module;
	}

	public function index()
	{
		$modules = $this->module->paginate(10);

		return view('admin.modules.index', compact('modules'));
	}

	public function create()
	{
		return view('admin.modules.create');
	}

	public function store(ModuleRequest $request)
	{
		try {
			$this->module->create($request->all());

			return redirect()
					->route('modules.index')
					->with('success', 'Módulo adicionado com sucesso!');

		} catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao adicionar módulo...';

			flash($message)->error();
			return redirect()->back()->with('danger', $message);
		}
	}

	public function show($id)
	{
		return redirect()->route('modules.edit', $id);
	}

	public function edit($id)
	{
		$module = $this->module->find($id);
		if (!$module) {
			return redirect()->route('modules.index')
								->with('danger', 'Módulo inexistente!');
		}

		return view('admin.modules.edit', compact('module'));
	}

	public function update(ModuleRequest $request, $id)
	{
		try {
			$module = $this->module->find($id);
			if (!$module) {
				return redirect()->route('modules.index')
									->with('danger', 'Módulo inexistente!');
			}

			$module->update($request->all());

			return redirect()
					->route('modules.index')
					->with('success', 'Módulo atualizado com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
			return redirect()->back()->with('success', $message);
		}
	}

	public function destroy($id)
	{
		try {
			$module = $this->module->find($id);
			if (!$module) {
				return redirect()->route('modules.index')
									->with('danger', 'Módulo inexistente!');
			}

			$module->delete();

			return redirect()
					->route('modules.index')
					->with('success', 'Módulo removido com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
			return redirect()->back()->with('success', $message);
		}
	}
}
