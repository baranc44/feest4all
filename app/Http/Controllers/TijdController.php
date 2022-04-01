<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Error;
use Illuminate\Support\Facades\DB;

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
            
            $uren = $request->all()["uren"];
            $date = date('Y-m-d H:i:s');
            $tomorrow = date("Y-m-d", strtotime('tomorrow'));

            foreach ($uren as $tijd) {
                if ($tijd[0] == null || $tijd[1] == "-1" || $tijd[3] == null) {
                    continue;
                }
                if ($tijd[1] == "-1") {
                    return abort(404, "Geen project geselecteerd.");
                }
                if ($tijd[2] == null) 
                {
                    $tijd[2] = "";
                } 
                if ($tijd[0] >= $date) {
                    return abort(404, "De datum klopt niet.");
                }
                
                $change = DB::table('uren')
                ->insert([
                    'project_id' => $tijd[1],
                    'member_id' => $request->all()["user_id"],
                    'uren' => $tijd[3],
                    'omschrijving' => $tijd[2],
                    'datum' => $tijd[0],
                    'created_at' => $date
                ]);
            }
            
        }
    }
}
