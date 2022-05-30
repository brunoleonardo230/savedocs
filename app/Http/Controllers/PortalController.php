<?php
//dd('oi');
namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;


class PortalController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the Landing.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
        $banner = [];
        return view('portal.index')->with('banner',$banner);
    }

    public function about()
    {
        return view('portal.about');
    }

    public function parasuacasa(Plan $plan)
    {
        $plans = $plan->with('features')->get();
        return view('portal.parasuacasa', compact('plans'));
    }


}
