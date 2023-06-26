<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Traffic2Controller extends Controller
{
    public function index(){
        return view('traffic2.traffic_index');
    }
}
