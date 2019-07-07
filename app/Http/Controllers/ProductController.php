<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        //

        $products = Product::paginate(4);
        return view('main',compact('products'));
    }

    public function menProducts(){


        $products = Product::where('type','men')->get();
        return view('menProducts',compact('products'));



    }

    public function womenProducts(){

        $products = Product::where('type','women')->get();
        return view('womenProducts',compact('products'));

    }

    public function search(Request $request ){

        $searchText = $request->get('search');
        $products = Product::where('name',"Like",$searchText."%")->paginate(2);
        return view("main",compact("products"));

    }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
