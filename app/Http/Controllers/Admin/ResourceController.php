<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
	
	private $resource;

	public function __construct(Resource $resource)
	{
		$this->resource = $resource;
	}

	public function index()
	{
		$resources = $this->resource->all();

		return view('admin.resources.index', compact('resources'));
	}

	public function create()
	{
		$modules = \App\Models\Module::all(['id', 'name']);
		return view('admin.resources.create', compact('modules'));
	}

	public function store(ResourceRequest $request)
	{
		try {

			$this->resource->create($request->all());

			return redirect()
					->route('resources.index')
					->with('success', 'Permissão adicionada com sucesso!');

		} catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

			return redirect()->back()->with('success', $message);
		}
	}

	public function show($id)
	{
		return redirect()->route('resources.edit', $id);
	}

	public function edit($id)
	{
		$resource = $this->resource->find($id);
		if (!$resource) {
			return redirect()->route('resources.index')
								->with('danger', 'Permissão inexistente!');
		}

		$modules = \App\Models\Module::all(['id', 'name']);
		
		return view('admin.resources.edit', compact('resource','modules'));
	}

	public function update(ResourceRequest $request, $id)
	{
		try {
			$resource = $this->resource->find($id);
			if (!$resource) {
				return redirect()->route('resources.index')
									->with('danger', 'Permissão inexistente!');
			}

			$resource->update($request->all());

			return redirect()
					->route('resources.index')
					->with('success', 'Permissão atualizada com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
			return redirect()->back()->with('success', $message);
		}
	}

	public function destroy($id)
	{
		try {

			$resource = $this->resource->find($id);
			if (!$resource) {
				return redirect()->route('resources.index')
									->with('danger', 'Permissão inexistente!');
			}

			$resource->delete();

			return redirect()
					->route('resources.index')
					->with('success', 'Permissão removida com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
			return redirect()->back()->with('danger', $message);
		}
	}
}
