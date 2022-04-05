<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Product;
use App\Models\Projectproducten;
use App\Models\Uren;

class OverzichtenController extends Controller
{
    public function overzichtMenu(){
        return view('overzichten');
    }

    public function urenOverzichtUser() {
        $users = DB::table('users')->get();
        $uren = DB::table('uren')->get();
        return view('urenOverzichtUser', [
            'users' => $users,
            'uren' => $uren
        ]);
    }
    public function overzichtOpties(){
        $projects = DB::table('project')->get();
        $products = DB::table('products')->get();
        return view('overzichtopties',[
            'projects' => $projects,
            'products' => $products
        ]);
    }
    public function getData(){
        $user = DB::table('users')->get();
        return view('overzichtopties',[
            'user' => $user 
        ]);
        
    }
    public function projectKiezen(){       
        $projects = DB::table('project')->get();
        return view('projectKiezen',[
            'projects' => $projects
        ]);
    }
    public function projectProducten($id){
        $project = Product::find($id);
        $product = Projectproducten::where("project_id", $id)->get();
        return view('projectProducten',[        
            'projects' => $project,
            'products' => $product
        ]);         
    }
    public function urenProject(){
        $project = DB::table('project')->get();
        return view('urenproject',[
            'projects' => $project
        ]);
    }
    public function urenProjectId($id){
        $project = Project::find($id);
        $uren = Uren::where("project_id", $id)->get();
        return view('projectList',[
            'projects' => $project,
            'uren' => $uren
        ]);
    }
    public function Overzicht(){
        return view('overzicht');
    }

    public function allUren_ajax(Request $request) {
        if ($request->ajax()) {
            
            $search = $request->get('search');

            $uren = DB::table('uren')
                    ->where('member_id', $search)
                    ->paginate(50);

                    return view('urenList', [
                        'uren' => $uren
                    ]);
        }
    }
    public function allProjects_ajax(Request $request){
        if($request->ajax()){

            $search = $request->get('search');


            $projects = DB::table('project')
                        ->where('id', $search)
                        ->paginate(50);

                        return view('projectList',[
                            'projects'=> $projects
                        ]);

        }
    }
    public function delete($id){
        $uren = Uren::find($id);
        $uren->delete();

        return redirect('/urenOverzichtUser');
    }
    
    
}
