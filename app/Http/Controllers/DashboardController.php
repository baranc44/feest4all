<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function redirectDashboard(){
        return view("/dashboard");
    }   
    public function showDashboard(){
        // $id = Auth::id();
        // $hours = Uren::select('SELECT h.datum, h.uren, h.gefactureerd FROM uren as h WHERE h.member_id = '.$id.' ORDER BY h.created_at DESC LIMIT 5');
        return view('dashboard', [
            // 'hours' => $hours
        ]);
    }
}
