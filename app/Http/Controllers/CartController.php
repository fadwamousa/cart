<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index(){
        return view('cart');
    }


    public function store(Request $request){

        Cart::add($request->id , $request->name , 1 , $request->price)->associate('App\Product');

        return redirect()->back()->with('msg','Item has Been Adedd');

    }


    public function remove($id){


        Cart::remove($id);
        return redirect()->back()->with('msg','The Item Has Been Removed');



    }
}
