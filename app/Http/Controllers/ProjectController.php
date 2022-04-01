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

    public function edit($id) {  
        // $lijst = Product::find($id);
        // $a = Projectproducten::where("product_id", $id)->get();
        $lijst = DB::table("products")->get();
        $project = Project::find($id);   
        $product = Projectproducten::where("project_id", $id)->get();
        return view('editproject',[
            'projects' => $project,
            'products' => $product,
            'lijst' => $lijst,
            // 'productLijst' => $a
        ]);         
    }

    function updateData(Request $request){
        $project = DB::table('project')->get();
        $id = $request->all()['id'];
        $array = $request->all()['array'];
        $pnaam = $request->all()['pnaam'];
        $pnummer = $request->all()['pnummer'];
        $update = DB::table('project')
            ->where('id', $id)
            ->update([
                'project_nummer' => $pnummer,
                'naam' => $pnaam
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
        if ($item[0] == "-1" || $item[1] == "")
        {
            return;
        }
        $project_product = ProjectProducten::create([
            'project_id' => $lastprojectId->id,
            'product_id' => $item[0], 
            'hoeveelheid' => $item[1],
            'opmerkingen' => $item[2] || ""
        ]);    
        }   
        response() ->json(['code'=>200,'success' => 'Hooray']);       
        return;
    }
    }  
 
        

