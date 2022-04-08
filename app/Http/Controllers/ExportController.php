<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function allExports(){
        return view('exporteren');
    }

    public function allExports_ajax(Request $request) {
        if ($request->ajax()) {
            
            $date = $request->get('date');
            //SELECT * FROM project as p WHERE p.created_at > "2002-04-06"
            $id= 1;
            $projects = Project::where('created_at', '>=', $date)->get();

            return view('ExporterenList', [
                'projects' => $projects
            ]);
            }
    }

    public function export($id) {
        // MAAK EEN EXPORT !
        $date = date("d/m/Y");
        $fileName = "urenexport $date.csv";

        $project = Project::find($id);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array("Project", "Datum", "Werknemer", "Omschrijving", "Uren");

        $callback = function() use($project, $columns) {
            $file = fopen('php://outpout', 'w');
            fputcsv($file, $columns, ';');

            foreach ($project->uren as $uren) {
                $row["Project"] = $project->name;
                $row["Datum"] = $uren->date;
                $row["Werknemer"] = $uren->member_id;
                $row["Omschrijving"] = $uren->omschrijving;
                $row["Uren"] = $uren->uren;
                fputcsv($file, array($row["Project"], $row["Datum"], $row["Werknemer"], $row["Omschrijving"], $row["Uren"], ), ';');
            }
            fclose($file);
            
        };
        //return response()->stream($callback, 200, $headers);

        return response()->download('img/menu-logo.png');
        

    }
}
