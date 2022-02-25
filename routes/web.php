<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\WerknemerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/werknemers', function () {

    $werknemers = DB::table('users')->get();
    return view('/werknemers', [
        'werknemers' => $werknemers
    ]);

})->name('werknemers');

Route::get('/producten', function () {

    $products = DB::table('products')
        ->get();
    return view('producten', [
        'products' => $products
    ]);
})->name('producten');

Route::get('/planning', function(){
    return view('planning');
})->name('planning');

Route::get('/overzichten', function(){
    return view('overzichten');
})->name('overzichten');

Route::get('/exporteren', function(){
    return view('exporteren');
})->name('exporteren');

Route::get('/projecten', function(){
    return view('projecten');
})->name('projecten');

Route::get('/werknemers/{id}/editwerknemer', [WerknemerController::class, 'edit']);

Route::get('/werknemers/addwerknemer', function(){
    return view('addwerknemer');
});



