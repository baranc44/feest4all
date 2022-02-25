<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
        $werknemer = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return redirect('/werknemers');

        
    }
}
