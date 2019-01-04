<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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
        $order = 'DESC';

        if (Input::has('order')) {
            $order = Input::get('order');
        }

        if (Input::has('sorteer')) {
            $sorteer = Input::get('sorteer');
            $products = Product::orderBy($sorteer, $order)->get();
        }


        return view('products.view',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //store new product
        $product = new \App\Product;
        $product->name      = Input::get('ProductName');
        $product->seller    = Auth::user()->id;
        $product->info      = Input::get('info');
        $product->price     = Input::get('price');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view ('products.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view ('products.view',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name      = Input::get('ProductName');
        $product->info      = Input::get('info');
        $product->price     = Input::get('price');
        $product->save();

        return redirect()->route('products.show',$product->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route ('products.index');
    }

    public function search($searchTerm) {
        $products = product::where('name', 'like', '%' . $searchTerm . '%')->get();
        return view('products.view', ['products' => $products]);
    }
}
