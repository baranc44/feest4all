<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Planning;

class PlanningController extends Controller
{
    public function allPlanning(){    
        return view('/planning');
    }
    
    public function action(Request $request){
        if($request->ajax()){
            dd($request);
            if($request->type == 'add'){
                $planning = Planning::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end
                ]);
                dd($planning);
                return response()->json($planning);
            }
        }
        
    }
}





