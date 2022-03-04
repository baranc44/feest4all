<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
