<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function allProducts(){
        $products = DB::table('products')
        ->get();
    return view('producten', [
        'products' => $products
    ]);
}
}