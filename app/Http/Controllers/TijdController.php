<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TijdController extends Controller
{
    public function showTijd() {

        return view('tijdregistratie');
    }
}
