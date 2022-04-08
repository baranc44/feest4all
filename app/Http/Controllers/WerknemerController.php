<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class WerknemerController extends Controller
{
    public function allUsers(){
    $werknemers = DB::table('users')->paginate(50);

    return view('werknemers', [
    'werknemers' => $werknemers
    ]);
}

    public function addView(){
        return view('/addwerknemer'); 
    }

    public function addUser(Request $request){
        
        $password =  bcrypt($request->input('password'));

        $werknemer = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password
        ]);
        $message = $this->message("Het account is toegevoegd.", "SUC");
        return redirect('/werknemers')->with('message', $message);    
    }
    public function edit(Request $request) {
        
        $werknemer = $request->all()["werknemer"];

        $change = DB::table('users')
            ->where('id', $werknemer[0])
            ->update([
                'name' => $werknemer[1],
                'email' => $werknemer[2]
            ]);

    }  
    public function delete($id){
        if (Auth::id() != $id) {
            $werknemer = User::find($id);
            $werknemer->delete();
            $message = $this->message("Het account is verwijderd.", "SUC");
        } else {
            $message = $this->message("Je kan niet je eigen account verwijderen.", "ERR");
            
        }
        return redirect('/werknemers')->with('message', $message);
        
    }
    public function pwedit(Request $request) {
        $pw = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);
    }

    function message($message, $code) {
        $returnMessage = "";
        if ($code == "ERR") {
            $returnMessage = '<div style="z-index: 10;border-radius:10px; margin-left:auto; margin-right:auto; background-color:rgb(205, 23, 23); color:white; padding: 10px; width: 30%; text-align:center;">
            <h2>'.$message.'</h2>
        </div>';
        } else if ($code == "SUC") {
            $returnMessage = '<div style="z-index: 10;border-radius:10px; margin-left:auto; margin-right:auto; background-color:rgb(41, 180, 17); color:white; padding: 10px; width: 30%; text-align:center;">
            <h2>'.$message.'</h2>
        </div>';
        }

        return $returnMessage;
    }
} 
