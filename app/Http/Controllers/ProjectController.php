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
            'naam' => $request->input('naam')
        ]);
        $lastprojectId = Project::select('id')->orderBy('created_at', 'DESC')->first();

        $project_product = ProjectProducten::create([
            'project_id' => $lastprojectId->id,
            'product_id' => $request->input('producten'),
            'hoeveelheid' => $request->input('amount'),
            'opmerkingen' => $request->input('comment')           
        ]);
        return redirect('/projecten');
    }
    }  
 
        

