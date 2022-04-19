<?php

namespace App\Http\Controllers;

use App\Models\export;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allExports()
    {
        return view('blades.exporteren.exporteren');
    }
    public function allExports_ajax(Request $request){
        if($request->ajax()){
            $date = $request->get('date');

            $projects = Project::where('created_at', '>=', $date)->get();
            $hours = Hours::where('hours', $hours)->get();
            return view('blades.exporteren.exporterenList',[
                'projects' => $projects,
                'hours' => $hours
            ]);
            
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Maak een export
        $date = date("d/m/Y h:i:s");
        $fileName = "urenexport $date.csv";

        $project = Project::where("id", $id)->get()[0];

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array("Datum", "Werknemer", "Omschrijving", "Uren");

        $callback = function() use($project, $hoursProject, $columns){
            $file = fopen('php://output', 'w');
            fputcsv($file, array('Project:', $project->name), ';');
            fputcsv($file, $columns, ';');

            foreach($hoursProject as $hours){
                $row["Datum"] = $uren->datum;
                $row["Werknemer"] = $uren->name;
                $row["Omschrijving"] = $uren->omschrijving;
                $row["Uren"] = $uren->uren;
                fputcsv($file, array($row["Datum"], $row["Werknemer"], $row["Omschrijving"], $row["Uren"]), ';');
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\export  $export
     * @return \Illuminate\Http\Response
     */
    public function show(export $export)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\export  $export
     * @return \Illuminate\Http\Response
     */
    public function edit(export $export)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\export  $export
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, export $export)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\export  $export
     * @return \Illuminate\Http\Response
     */
    public function destroy(export $export)
    {
        //
    }
}
