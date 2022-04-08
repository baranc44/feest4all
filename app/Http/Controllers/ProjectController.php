<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Product;
use App\Models\Projectproducten;
use App\Http\Controllers\Products;
use RealRashid\SweetAlert\Facades\Alert;


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
        $project = Project::find($id);
        $products = Projectproducten::where("project_id", $id)->get();
        $lijst = DB::table("products")->get();
        $newlijst = array();
        foreach ($lijst as $list) {
            $i= true;
            foreach ($products as $product) {
                if (($list->id == $product["product_id"])) {
                    $i= false;
                }
            }
            if ($i) {
                array_push($newlijst, $list);
            }
        }

        return view('editproject',[
            'projects' => $project,
            'products' => $products,
            'lijst' => $newlijst
        ]);         
    }

    function updateData(Request $request){
        $project = DB::table('project')->get();
        $projectP = DB::table('project_producten')->get();
        $id = $request->all()['id'];
        $array = $request->all()['array'];
        $pnaam = $request->all()['pnaam'];
        $pnummer = $request->all()['pnummer'];
        
        $update = DB::table('project')
            ->where('id', $id)
            ->update([
                'naam' => $pnaam,
                'project_nummer' => $pnummer
            ]);

        foreach ($array as $element) {
            if ($element[0]) {
                
                    if (!$element[3]) {
                        $element[3] = "";
                    }
            
                    $project_product = DB::table('project_producten')
                    ->where('id', $element[0])
                    ->update([
                        'product_id' => $element[1], 
                        'hoeveelheid' => $element[2],
                        'opmerkingen' => $element[3]
                    ]);   
                
            } else {
                // insert

                if (!$element[3]) {
                    $element[3] = "";
                }
        
                $project_product2 = DB::table('project_producten')
                ->insert([
                    'project_id' => $id,
                    'product_id' => $element[1], 
                    'hoeveelheid' => $element[2],
                    'opmerkingen' => $element[3]
                ]);
            }
        }

       
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
        if (!$item[2]) {
            $item[2] = "";
        }

        $project_product = ProjectProducten::create([
            'project_id' => $lastprojectId->id,
            'product_id' => $item[0], 
            'hoeveelheid' => $item[1],
            'opmerkingen' => $item[2]
        ]);    
        }   
        response() ->json(['code'=>200,'success' => 'Hooray']);       
        return;
    }
    }  
 
        

