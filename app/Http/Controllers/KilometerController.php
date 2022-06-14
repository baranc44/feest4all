<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KilometerController extends Controller
{
    public function index(){
        return view('blades.kilometerregistratie.kmdashboard');
    }
}
