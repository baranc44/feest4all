<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/producten', function () {
    return view('producten');
})->name('producten');

Route::get('/planning', function(){
    return view('planning');
})->name('planning');

Route::get('/overzichten', function(){
    return view('overzichten');
})->name('overzichten');

Route::get('/werknemers', function(){
    return view('werknemers');
})->name('werknemers');

Route::get('/exporteren', function(){
    return view('exporteren');
})->name('exporteren');

Route::get('/projecten', function(){
    return view('projecten');
})->name('projecten');