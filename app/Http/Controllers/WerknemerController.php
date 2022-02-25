<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WerknemerController extends Controller
{
    public function edit($id){
        $werknemer = DB::find($id);
        dd($id);
        return view('editwerknemer');
    }
}
