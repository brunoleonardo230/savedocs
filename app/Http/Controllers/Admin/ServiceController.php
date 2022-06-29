<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use Illuminate\Http\Request;

use App\Models\{ Service };

class ServiceController extends Controller
{
    private $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
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
        $services = $this->service->all();

        return view('admin.services.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        try {
	    	$this->service->create($request->all());

		    return redirect()
					->route('services.create')
					->with('success', 'Serviço adicionado com sucesso!');

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
        $service = $this->service->find($id);
	    return view('admin.services.edit', compact('service'));
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

		    $service = $this->service->find($id);
			if (!$service) {
				return redirect()->route('services.create')
									->with('danger', 'Recurso inexistente!');
			}

		    $service->update($request->all());

		    return redirect()
					->route('services.create')
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

			$service = $this->service->find($id);
			if (!$service) {
				return redirect()->route('services.create')
									->with('danger', 'Recurso inexistente!');
			}

			$service->delete();

			return redirect()
					->route('services.create')
					->with('success', 'Recurso removido com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
			return redirect()->back()->with('danger', $message);
		}
    }
}
