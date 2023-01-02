<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\{ 
    Equipament, User
};

class EquipamentController extends Controller
{
    private $equipament;

    public function __construct(Equipament $equipament)
    {
        $this->equipament = $equipament;
    }

    public function index()
    {
        $equipaments = $this->equipament->get();
    
        return view('admin.equipaments.index', compact('equipaments'));
    }

    public function create()
    {
        $users = User::all();
        $equipamentType = config('savedocs.equipament_type');

        return view('admin.equipaments.create', compact('users', 'equipamentType'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            $this->equipament->create($data);
            
            DB::commit();
            return redirect()
                ->route('equipaments.index')
                ->with('success', 'Equipamento cadastrado com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Não foi possível cadastrar o equipamento';
			return redirect()
                ->back()
                ->withInput()
                ->withErrors($request->all())
                ->with('danger', $message);
        }
    }

    public function edit($id)
    {
        $equipament = $this->equipament->find($id);
        if (!$equipament) {
            return redirect()
                ->route('equipaments.index')
                ->with('danger', 'Não foi possível identificar este equipamento');
        }

        $users = User::all();
        $equipamentType = config('savedocs.equipament_type');
       
        return view('admin.equipaments.edit', compact('equipament', 'users', 'equipamentType'));
    }

    public function update(Request $request, $id)
    {
	    try {
		    $equipament = $this->equipament->find($id);
			if (!$equipament) {
				return redirect()
                    ->route('equipaments.index')
                    ->with('danger', 'Não foi possível identificar este equipamento');
			}

		    $equipament->update($request->all());
		    return redirect()
                ->route('equipaments.index')
                ->with('success', 'Equipamento atualizado com sucesso!');

	    } catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Não foi possível atualizar o equipamento';
		    return redirect()->back()->with('danger', $message);
	    }
    }

    public function destroy($id)
    {
        try {
			$equipament = $this->equipament->find($id);
            if (!$equipament) {
                return redirect()
                    ->route('equipaments.index')
                    ->with('danger', 'Não foi possível identificar este equipamento');
            }

			$equipament->delete();

			return redirect()
                    ->route('equipaments.index')
                    ->with('success', 'Equipamento removido com sucesso');

        }catch (\Exception $e) {
        	$message = env('APP_DEBUG') ? $e->getMessage() : 'Não foi possível remover o equipamento';
        	return redirect()->back()->with('danger', $message);
        }
    }
}