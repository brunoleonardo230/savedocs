<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatusRequest;
use Illuminate\Http\Request;

use App\Models\{ Status };

class StatusController extends Controller
{
    private $status;

	public function __construct(Status $status)
	{
		$this->status = $status;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = $this->status->all();

        return view('admin.statuses.create', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = $this->status->all();

        return view('admin.statuses.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        try {
	    	$this->status->create($request->all());

		    return redirect()
					->route('statuses.create')
					->with('success', 'Status adicionado com sucesso!');

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
        $status = $this->status->find($id);
	    return view('admin.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        try {

		    $status = $this->status->find($id);
			if (!$status) {
				return redirect()->route('statuses.create')
									->with('danger', 'Status inexistente!');
			}

		    $status->update($request->all());

		    return redirect()
					->route('statuses.create')
					->with('success', 'Status atualizado com sucesso!');

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

			$status = $this->status->find($id);
			if (!$status) {
				return redirect()->route('statuses.create')
									->with('danger', 'Status inexistente!');
			}

			$status->delete();

			return redirect()
					->route('statuses.create')
					->with('success', 'Status removido com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';
			return redirect()->back()->with('danger', $message);
		}
    }
}
