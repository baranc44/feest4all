<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Planning;

class PlanningController extends Controller
{
    public function allPlanning(){  
        $events = array();
        $planning = Planning::all();    
        foreach($planning as $planning){
            $events[] = [
                'id' => $planning->id,
                'uren' => $planning->uren,
                'omschrijving' => $planning->omschrijving,
                'datum' => $planning->datum,
                'project_id' => $planning->project_id,
                'user_id' => $planning->user_id
            ];   
            // dd($events);
        }  
        $werknemer = DB::table("users")->get();
        $project = DB::table("project")->get();

        return view('/planning',[
            'werknemer' => $werknemer,
            'project' => $project,
            'events' => $events
        ]);
    }
    
    public function action(Request $request){
        // $project = DB::table('project')->get('id');
        $request->ajax();
        if($request->type = 'POST'){
            $planning = Planning::create([
                'uren' => $request->uren,
                'omschrijving' => $request->omschrijving,
                'project_id' => $request->project,
                'user_id' => $request->werknemer,
                'datum' => $request->date
            ]);

            $planning = Planning::latest()->first();
                     
            return array('planning' => $planning);

            return response()->json($planning);
            $planning->save();
        }
    }
    public function delete($id){
        $planning = Planning::find($id);
        if(! $planning){
            return response()->json([
                 'error' => 'Unable to locate the event'
            ], 404);
        }
        $planning->delete();
        return $id;
    }
}





