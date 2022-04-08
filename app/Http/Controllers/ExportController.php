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
        $date = date("d/m/Y h:i:s");
        $fileName = "urenexport $date.csv";

        $project = Project::find($id);

        $urenProject = DB::select('SELECT h.datum, u.name, h.omschrijving, h.uren FROM uren as h, users as u WHERE h.project_id = '.$id.' AND h.member_id = u.id');
        
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array("Datum", "Werknemer", "Omschrijving", "Uren");

        $callback = function() use($project, $urenProject, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, array('Project:', $project->naam), ';');

            fputcsv($file, $columns, ';');

            foreach ($urenProject as $uren) {
                $row["Datum"] = $uren->datum;
                $row["Werknemer"] = $uren->name;
                $row["Omschrijving"] = $uren->omschrijving;
                $row["Uren"] = $uren->uren;
                fputcsv($file, array($row["Datum"], $row["Werknemer"], $row["Omschrijving"], $row["Uren"]),';');
            }
            fclose($file);
            
        };
        return response()->stream($callback, 200, $headers);

        // return response()->download('img/menu-logo.png');
        

    }
}
