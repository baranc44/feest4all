<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Product;
use App\Models\Projectproducten;
use App\Http\Controllers\Products;

class ProjectController extends Controller
{
    public function allProjects(){
        $projecten = DB::table('project')
            ->get();
        return view('projecten',[
        'projecten' => $projecten
        ]);
    }

    public function edit(Request $request) {
        
        $project = $request->all()["project"];

        $change = DB::table('project')
            ->where('id', $project[0])
            ->update([
                'name' => $project[1],
                'email' => $project[2]
            ]);
    }  
    public function addView(){
        $products = DB::table('products')->get();
        return view('/addproject', [
            'products' => $products
        ]);
    }

    public function addProject(Request $request){
        //insert new project
        $project = Project::create([
            'project_nummer' => $request->input('project_nummer'),
            'naam' => $request->input('naam')
        ]);
        return redirect('/projecten');
        //get last project (nieuwe project)
        $lastproject_id = Project::select('id')->OrderBy('created_at', 'DESC')->First();

        //voor dat laatste project x aantal producten
        foreach($products as $product){
            $project_products = New ProjectProduct;
            $project_products->project_id = $lastproject_id;
            $project_products->product_id = $product->id;
            $project_products->hoeveelheid = $product->hoeveelheid;
            $project_products->afgeleverd = $product->afgeleverd;  
        }                        
    }
}
