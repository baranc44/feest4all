<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirectDashboard() {
        return redirect('/dashboard');
    }

    public function showDashboard() {
    $id= Auth::id();
    $uren = DB::select('SELECT h.datum, h.uren, h.gefactureerd FROM uren as h WHERE h.member_id = '.$id.' ORDER BY h.created_at  DESC LIMIT 5');
    return view('dashboard', [
        'uren' => $uren
    ]);
    }
}
