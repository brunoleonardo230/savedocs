<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SectorController extends Controller
{
    private $sector;

    public function __construct(Sector $sector)
    {
        $this->sector = $sector;
    }

    public function index()
    {
        $sectors = $this->sector->get();

        return view('parameters.sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('parameters.sector.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            $this->sector->create($data);
            
            DB::commit();
            return redirect()
                ->route('sector.index')
                ->with('success', 'Setor cadastrado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Não foi possível cadastrar o setor';
			return redirect()
                ->back()
                ->withInput()
                ->withErrors($request->all())
                ->with('danger', $message);
        }
    }

    public function edit($id)
    {
        $sector = $this->sector->find($id);
        if (!$sector) {
            return redirect()
                ->route('sector.index')
                ->with('danger', 'Não foi possível identificar este setor');
        }
       
        return view('parameters.sector.edit', compact('sector'));
    }

    public function update(Request $request, $id)
    {
	    try {
		    $sector = $this->sector->find($id);
			if (!$sector) {
				return redirect()
                    ->route('sector.index')
                    ->with('danger', 'Não foi possível identificar este setor');
			}

		    $sector->update($request->all());
		    return redirect()
                ->route('sector.index')
                ->with('success', 'Setor atualizado com sucesso!');

	    } catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Não foi possível atualizar o setor';
		    return redirect()->back()->with('danger', $message);
	    }
    }

    public function destroy($id)
    {
        try {
			$sector = $this->sector->find($id);
            if (!$sector) {
                return redirect()
                    ->route('sector.index')
                    ->with('danger', 'Não foi possível identificar este setor');
            }

			$sector->delete();

			return redirect()
                    ->route('sector.index')
                    ->with('success', 'Setor removido com sucesso');

        }catch (\Exception $e) {
        	$message = env('APP_DEBUG') ? $e->getMessage() : 'Não foi possível remover o setor';
        	return redirect()->back()->with('danger', $message);
        }
    }
}