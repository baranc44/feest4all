<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class TijdController extends Controller
{
    public function showTijd() {

        $projects = Project::all();

        return view('tijdregistratie', [
            'projects' => $projects
        ]);
    }

    public function add(Request $request) {
        if ($request->all() != null) {
            dd($request->all());
        }
    }
}
