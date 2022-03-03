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
    public function delete($id){
        $project = Project::find($id);
        $project->delete();

        return redirect('/projecten');
    }
    public function addView(){
        $products = DB::table('products')->get();
        return view('/addproject', [
            'products' => $products
        ]);
    }

    public function addProject(Request $request){
        $pnaam = $request->all()["pnaam"];
        $pnummer = $request->all()["pnummer"];
        $array = $request->all()["array"];

        $project = Project::create([
            'project_nummer' => $pnummer,            
            'naam' => $pnaam          
        ]);
        $lastprojectId = Project::select('id')->orderBy('created_at', 'DESC')->first();

        foreach($array as $item){
        $project_product = ProjectProducten::create([
            'project_id' => $lastprojectId->id,
            'product_id' => $item[0],
            'hoeveelheid' => $item[1],
            'opmerkingen' => $item[2]
        ]);    
    }     
        return redirect('/projecten');
    }
    }  
 
        

