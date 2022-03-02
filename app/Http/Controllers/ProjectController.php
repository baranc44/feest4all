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

        $project = Project::create([
            'project_nummer' => $request->input('project_nummer'),
            'naam' => $request->input('naam'),
        ]);

        // $lastproject_id = Project::select('id')->orderBy('created_at', 'DESC')->first();
        // $product_id = Product::select('id')->orderBy('created_at', 'DESC')->first();
    
        // $project_producten = ProjectProducten::create([
        //     'project_id' => $lastproject_id,
        //     'product_id' => $product_id,
        //     'hoeveelheid' => $request->input('amount'),
        //     'opmerkingen' => $request->input('comment')
        // ]);

        // $lastproject = Project::select('id')->orderBy('created_ad', 'DESC')->first();
        // // voor dat laatste project x aantal producten
        // foreach($lastproject as $product){
        //     $project_products = new ProjectProducten;
        //     $project_products->project_id = $lastproject;
        //     $project_products->product_id = $product->id;
        //     $project_products->hoeveelheid = $product->hoeveelheid;
        //     $project_products->afgeleverd = $product->afgeleverd;
        //     $project_products->save();
        // }
        return redirect('/projecten');
    }
}
        
 
        

