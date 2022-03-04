<?php

namespace App\Http\Controllers;
use App\Models\Project;
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
            foreach ($uren as $tijd) {
                if ($tijd[1] == "-1") {
                    $tijd[1] = null; // zorg dat er een error komt (omdat ik niet weet hoe het anders moet.)
                }
                $change = DB::table('uren')
                ->insert([
                    'project_id' => $tijd[1],
                    'member_id' => $request->all()["user_id"],
                    'uren' => $tijd[3],
                    'omschrijving' => $tijd[2] || "",
                    'datum' => $tijd[0],
                    'created_at' => $date
                ]);
            }
            
        }
    }
}
