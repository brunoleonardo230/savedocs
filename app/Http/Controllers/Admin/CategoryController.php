<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;

use App\Models\{ Category };

class CategoryController extends Controller
{
    private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->paginate(10);

		return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
	    	$this->category->create($request->all());

		    return redirect()
					->route('categories.index')
					->with('success', 'Categoria adicionada com sucesso!');

	    }catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar criação...';

		    //flash($message)->error();
		    return redirect()->back()->with('danger', $message);
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
	    return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

		    $category = $this->category->find($id);
			if (!$category) {
				return redirect()->route('categories.index')
									->with('danger', 'Categoria inexistente!');
			}

		    $category->update($request->all());

		    return redirect()
					->route('categories.index')
					->with('success', 'Categoria atualizada com sucesso!');

	    } catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
		    return redirect()->back()->with('danger', $message);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$category = $this->category->find($id);
			if (!$category) {
				return redirect()->route('categories.index')
									->with('danger', 'Categoria inexistente!');
			}

			$category->delete();

			return redirect()
						->route('categories.index')
						->with('success', 'Categoria removida com sucesso!');

        }catch (\Exception $e) {
        	$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
        	return redirect()->back()->with('danger', $message);
        }
    }

    public function syncservices(int $category)
	{
		$category = $this->category->find($category);
		$services = \App\Models\Service::all(['id', 'name']);

		return view('admin.categories.sync-services', compact('category', 'services'));
	}

	public function updateSyncServices($category, Request $request)
	{
		try{
			$category = $this->category->find($category);
			$category->services()->sync($request->services);


			return redirect()
						->route('categories.services', $category)
						->with('success', 'serviços atribuidas com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adição de serviço...';
			return redirect()->back()->with('danger', $message);
		}
	}
}
