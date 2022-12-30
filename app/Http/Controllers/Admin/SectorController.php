<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;

class SectorController extends Controller
{
    private $sector;

    public function __construct(Sector $sector)
    {
        $this->sector = $sector;
    }

    public function index()
    {
        $sectors = $this->sector->where('is_active', true)->get();

        return view('parameters.sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('parameters.sector.create');
    }
}