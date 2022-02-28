<?php

namespace App\Http\Controllers;

use App\Models\product;
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

    public function add() {

        return view('productadd');
    }

    public function insert(Request $request) {

        $date = date('Y-m-d H:i:s');

        $change = DB::table('products')
            ->insert([
                'naam' => $request->naam,
                'voorraad' => $request->voorraad,
                'prijs' => $request->prijs,
                'eenheid' => $request->eenheid,
                'created_at' => $date
            ]);

        return redirect('/producten');
    }

    public function edit(Request $request) {
        
        $product = $request->all()["product"];
        $date = date('Y-m-d H:i:s');

        $change = DB::table('products')
            ->where('id', $product[0])
            ->update([
                'naam' => $product[1],
                'voorraad' => $product[2],
                'prijs' => $product[3],
                'eenheid' => $product[4],
                'updated_at' => $date
            ]);

    }

    public function delete($id) {

        $change = DB::table('products')
            ->where('id', $id)
            ->delete();

        return redirect('/producten');

    }

}