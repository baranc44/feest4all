<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\WerknemerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OverzichtenController;
use App\Http\Controllers\TijdController;

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

Route::middleware(['auth'])->group(function () {
// werknemers
Route::get('/werknemers', [WerknemerController::class, 'allUsers'])->name('werknemers');
Route::get('/werknemer/add', [WerknemerController::class, 'addView'])->name('addwerknemer');
Route::post('/addwerknemerdata', [WerknemerController::class, 'addUser'])->name('addwerknemerdata');
Route::post('/werknemeredit', [WerknemerController::class, 'edit'])->name('werknemeredit');
Route::delete('/werknemer/{id}/delete', [WerknemerController::class, 'delete'])->name('werknemerdelete');
Route::post('/passwordedit', [WerknemerController::class, 'pwedit'])->name('passwordedit');

// producten
Route::get('/producten', [ProductsController::class, 'allProducts'])->name('producten');
Route::get('/producten_ajax', [ProductsController::class, 'allProducts_ajax'])->name('productenajax');

Route::get('/product/add', [ProductsController::class, 'add'])->name('productadd');
Route::post('/product/addproduct', [ProductsController::class, 'insert'])->name('addproduct');
Route::post('/product/edit', [ProductsController::class, 'edit'])->name('productedit');
Route::delete('product/{id}/delete', [ProductsController::class, 'delete'])->name('productdel');

// planning
Route::get('/planning', [PlanningController::class, 'allPlanning'])->name('planning');

// tijd registratie
Route::get('/tijdregistratie', [TijdController::class, 'showTijd'])->name('tijdregistratie');
Route::post('tijdpost', [TijdController::class, 'add'])->name('tijdpost');

// overzichten
Route::get('/overzichten', [OverzichtenController::class, 'allOverzichten'])->name('overzichten');

// exporteren
Route::get('/exporteren', [ExportController::class, 'allExports'])->name('exporteren');

// projecten
Route::get('/projecten', [ProjectController::class, 'allProjects'])->name('projecten');
Route::get('/project/add', [ProjectController::class, 'addView'])->name('addproject');
Route::post('/addprojectdata',[ProjectController::class, 'addProject'])->name('addprojectdata');
Route::post('/project/edit', [ProjectController::class, 'edit'])->name('editproject');

});

