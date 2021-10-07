<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        return view('products/.list', compact('products','categories'));
    }

    // Método para cargar masivamente productos
    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new ProductsImport, $file);
            return back()->with('message', "Importación exitosa :D");
        } catch (NoTypeDetectedException $e) {
            dd($e);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->iva = $request->iva;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->status_id = 1;
        $product->save();
        $products = Product::select('statuses.name as status','users.name as user','categories.name as category','products.*')->join('statuses', 'statuses.id', '=', 'products.status_id')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->get();
        return ['products' => $products];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return ['product' => $product];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->iva = $request->iva;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->save();
        $products = Product::select('statuses.name as status','users.name as user','categories.name as category','products.*')->join('statuses', 'statuses.id', '=', 'products.status_id')
                                                                            ->join('users', 'users.id', '=', 'products.user_id')
                                                                            ->join('categories', 'categories.id', '=', 'products.category_id')
                                                                            ->get();
        return ['products' => $products];
    }

    public function updateStatus($id)
    {
        $product = Product::find($id);
        if ($product->status_id == 1) {
            $product->status_id = 2;
        } else {
            $product->status_id = 1;
        }
        $product->save();
        $products = Product::select('statuses.name as status','users.name as user','categories.name as category','products.*')->join('statuses', 'statuses.id', '=', 'products.status_id')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->get();
        return ['products' => $products];
    }
}
