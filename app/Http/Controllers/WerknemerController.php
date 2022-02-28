<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WerknemerController extends Controller
{
    public function allUsers(){
        $werknemers = DB::table('users')
        ->get();
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

        return redirect('/werknemers');    
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
        $werknemer = User::find($id);
        $werknemer->delete();

        return redirect('/werknemers');
    }
    public function pwedit(Request $request) {
        $pw = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);
    }
} 
