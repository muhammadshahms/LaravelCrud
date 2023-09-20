<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    Public function index(){

        return view('products.index',[
            'products' => product::get()
        ]);
    }
    Public function create(){
        return view('products.create');
    }
    Public function store( Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required', //|mimes:jpg,jpeg,png|max:2048
        ]); 

        $imageName = time() . '.' . $request->image -> extension();
        $request->image->move(public_path('images'), $imageName);
        
        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();
        
        return back() -> with('success',$product->name . ' Added Successfully');
    }

    public function edit($id){
        $product = product::where('id',$id)->first();
        return view('products.edit',[
            'product' => $product
        ]);
        // dd($id);
    }
    public function update(Request $request, $id){

        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable', //|mimes:jpg,jpeg,png|max:2048
        ]);

        $product = product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName = time() . '.' . $request->image -> extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
        
        $product->description = $request->description;
        
        $product->save();
        
        return back() -> with('success','Product updated');

    }
    public function delete($id){
        $product = product::where('id',$id)->first();
        $product->delete();
        return back() -> with('success','Product deleted');
    }
}
