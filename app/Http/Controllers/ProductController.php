<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
  public function store(Request $request){
    $product= new Product();
    $product->product_name=$request->product_name;
    $product->category_name=$request->category_name;
    $product->brand_name=$request->brand_name;
    $product->model_number=$request->model_number;
    $product->stock=$request->stock;
    $product->price=$request->price;   		
    $active=Input::has('active') ?  true : false;
    $product->status=$active;
    $product->save();
    return redirect('/home/manage_product');
 }
 public function edit($id){
   $product= Product::find($id)->where('id',$id)->first();    
   return view('custom_view.edit_product',compact('product'));
}
public function update(Request $request){
   $id=$request->input('id');
   $product= Product::find($id);
   $product->product_name=$request->product_name;
   $product->category_name=$request->category_name;
   $product->brand_name=$request->brand_name;
   $product->model_number=$request->model_number;
   $product->stock=$request->stock;
   $product->price=$request->price;       
   $active=Input::has('active') ?  true : false;
   $product->status=$active;
   $product->save();
   return redirect('/home/manage_product');
}
public function delete($id){
   Product::find($id)->delete();    
   return redirect('/home/manage_product');
}

}
