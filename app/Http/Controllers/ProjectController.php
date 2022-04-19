<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\project;
use App\Models\projectproducten;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projecten = project::all();

        return view('blades.projects.projects', [
            'projecten' => $projecten
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();

        return view('blades.projects.createProject', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_number = $request->project_number;
        $project_name = $request->project_name;
        $products_project = $request->array;
        $date = date('Y-m-d H:i:s');

        $create_project = Project::create([
            "project_number" => $project_number,
            "name" => $project_name,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $project_id = $create_project->id;

        foreach ($products_project as $product) {
            if ($product[0] == "-1") {
                return;
            } else if ($product[2] == null) {
                $product[2] = "";
            }
            
            $create_project_product = projectproducten::create([
                "project_id" => $project_id,
                "product_id" => $product[0],
                "amount" => $product[1],
                "comments" => $product[2]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $products = product::all();

        return view('blades.projects.editProject', [
            'project' => $project,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }
}
