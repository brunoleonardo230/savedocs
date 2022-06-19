<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use Illuminate\Http\Request;

use App\Models\{ Feature };

class FeatureController extends Controller
{
    private $feature;

	public function __construct(Feature $feature)
	{
		$this->feature = $feature;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = $this->feature->all();

        return view('admin.features.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        try {
	    	$this->feature->create($request->all());

		    return redirect()
					->route('features.create')
					->with('success', 'Recurso adicionado com sucesso!');

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
        $feature = $this->feature->find($id);
	    return view('admin.features.edit', compact('feature'));
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

		    $feature = $this->feature->find($id);
			if (!$feature) {
				return redirect()->route('features.create')
									->with('danger', 'Recurso inexistente!');
			}

		    $feature->update($request->all());

		    return redirect()
					->route('features.create')
					->with('success', 'Recurso atualizado com sucesso!');

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

			$feature = $this->feature->find($id);
			if (!$feature) {
				return redirect()->route('features.create')
									->with('danger', 'Recurso inexistente!');
			}

			$feature->delete();

			return redirect()
					->route('features.create')
					->with('success', 'Recurso removido com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
			return redirect()->back()->with('danger', $message);
		}
    }
}
