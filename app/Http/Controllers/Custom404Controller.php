<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Custom404Controller extends Controller
{
    public function index(){
        return view('404.404');
    }
}
