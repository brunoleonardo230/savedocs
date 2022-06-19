<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

use App\Models\{ Plan };

class PlanController extends Controller
{
    private $plan;

	public function __construct(Plan $plan)
	{
		$this->plan = $plan;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = $this->plan->paginate(10);

		return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        try {
	    	$this->plan->create($request->all());

		    return redirect()
					->route('plans.index')
					->with('success', 'Plano adicionado com sucesso!');

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
        $plan = $this->plan->find($id);
	    return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $id)
    {
        try {

		    $plan = $this->plan->find($id);
			if (!$plan) {
				return redirect()->route('plans.index')
									->with('danger', 'Plano inexistente!');
			}

		    $plan->update($request->all());

		    return redirect()
					->route('plans.index')
					->with('success', 'Plano atualizado com sucesso!');

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
        //
    }

    public function syncfeatures(int $plan)
	{
		$plan = $this->plan->find($plan);
		$features = \App\Models\Feature::all(['id', 'name']);

		return view('admin.plans.sync-features', compact('plan', 'features'));
	}

	public function updateSyncFeatures($plan, Request $request)
	{
		try{
			$plan = $this->plan->find($plan);
			$plan->features()->sync($request->features);


			return redirect()
						->route('plans.features', $plan)
						->with('success', 'serviços atribuidas com sucesso!');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adição de serviço...';
			return redirect()->back()->with('danger', $message);
		}
	}
}
