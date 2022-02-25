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

    public function addUser(Request $request){
        return view('/addwerknemer');      
    }
    
}
