<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class TijdController extends Controller
{
    public function showTijd() {

        $products = Project::all();

        return view('tijdregistratie', [
            'products' => $products
        ]);
    }
}
