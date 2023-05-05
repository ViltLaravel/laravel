<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logo = Logo::select('logo_pic')->first(); 
        $totalusers = User::count();
        $totalfreelancer = User::select('*')->where('role','=','freelancer')->count();
        $totalemployer = User::select('*')->where('role','=','employer')->count();
        $totaladmin = User::select('*')->where('role','=','admin')->count();
        return view('backend.layouts.dashboard', compact('logo','totalusers','totalfreelancer', 'totalemployer', 'totaladmin'));
    }
}
