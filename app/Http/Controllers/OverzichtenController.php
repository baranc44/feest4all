<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverzichtenController extends Controller
{
    public function allOverzichten(){
        return view('overzichten');
    }
}
