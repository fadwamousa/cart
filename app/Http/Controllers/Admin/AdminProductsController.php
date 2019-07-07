<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductsController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.showproducts',compact('products'));
    }

    public function create()
    {
        //

        return view('admin.add');
    }


    public function store(Request $request)
    {
        $rules = [
            'image' => 'image|mimes:jpg,png,jpeg|max:5000',
            'name'  => 'required' ,
            'description' => 'required',
            'type' => 'required'];
        $this->validate($request , $rules);


        $data    = $request->all();
        if($file = $request->file('image')){



            $name = $file->getClientOriginalName();
            $file->move('images',$name);

            $data['image'] = $name;



        }
        $product = Product::create($data);

        Session::flash('msg','The Items Has Been Created');
        return redirect('admin/products');
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
          $rules = ['image' => 'image|mimes:jpg,png,jpeg|max:5000'];
          $this->validate($request , $rules);

          $product = Product::findOrFail($id);
          $data    = $request->all();
          if($file = $request->file('image')){

              unlink(public_path().'/images/'.$product->image);

              $name = $file->getClientOriginalName();
              $file->move('images',$name);

              $data['image'] = $name;

          }
          $product->update($data);

          Session::flash('msg','The Items Has Been Updated');
          return redirect('admin/products');




    }




    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editproducts',compact('product'));
    }



    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        unlink(public_path().'/images/'.$product->image);
        $product->delete();

        return redirect()->back();
    }
}
