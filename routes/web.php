<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\WerknemerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OverzichtenController;

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

// werknemers
Route::get('/werknemers', [WerknemerController::class, 'allUsers'])->name('werknemers');
Route::get('/werknemer/add', [WerknemerController::class, 'addView'])->name('addwerknemer');
Route::post('/addwerknemerdata', [WerknemerController::class, 'addUser'])->name('addwerknemerdata');
Route::post('/werknemeredit', [WerknemerController::class, 'edit'])->name('werknemeredit');

// producten
Route::get('/producten', [ProductsController::class, 'allProducts'])->name('producten');
Route::post('/product/edit', [ProductsController::class, 'edit'])->name('productedit');
Route::delete('product/{id}/delete', [ProductsController::class, 'delete'])->name('productdel');

// planning
Route::get('/planning', [PlanningController::class, 'allPlanning'])->name('planning');
Route::get('/overzichten', [OverzichtenController::class, 'allOverzichten'])->name('overzichten');
Route::get('/exporteren', [ExportController::class, 'allExports'])->name('exporteren');
Route::get('/projecten', [ProjectController::class, 'allProjects'])->name('projecten');





