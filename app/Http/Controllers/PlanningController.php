<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Planning;

class PlanningController extends Controller
{
    public function allPlanning(){  
        $werknemer = DB::table("users")->get();
        $project = DB::table("project")->get();
        return view('/planning',[
            'werknemer' => $werknemer,
            'project' => $project
        ]);
    }
    
    public function action(Request $request){
              
    }
}





