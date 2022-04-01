<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function allProducts(){
        $products = DB::table('products')->paginate(50);
        
        return view('producten', [
        'products' => $products
    ]);
    }

    public function allProducts_ajax(Request $request) {
        if ($request->ajax()) {
            
            $search = $request->get('search');

            $products = DB::table('products')
                    ->where('naam', 'like', '%'.$search.'%')
                    ->orWhere('voorraad', 'like', '%'.$search.'%')
                    ->orWhere('prijs', 'like', '%'.$search.'%')
                    ->orWhere('eenheid', 'like', '%'.$search.'%')
                    ->paginate(50);



                    return view('productsList', [
                        'products' => $products
                    ]);
        }
    }

    public function add() {

        return view('productadd');
    }

    public function insert(Request $request) {

        $date = date('Y-m-d H:i:s');

        if ($request->naam == null || $request->voorraad == null || $request->prijs == null || $request->eenheid == null)
        {
            return redirect('/producten');
        }

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

        if ($product[0] == null || $product[1] == null || $product[2] == null || $product[3] == null || $product[4] == null)
        {
            return;
        }
        
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