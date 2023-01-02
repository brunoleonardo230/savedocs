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
        dd($request->all());
        
    }
}