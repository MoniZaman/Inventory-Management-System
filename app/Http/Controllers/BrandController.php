<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;
use Illuminate\Support\Facades\Input;
class BrandController extends Controller
{
  public function store(Request $request){
    $brand= new Brand();
    $brand->brand_name=$request->brand_name;
    $active=Input::has('active') ?  true : false;
    $brand->status=$active;
    $brand->save();
    return redirect('/home/manage_brand');
 }

 public function edit($id){
    $brand= Brand::find($id)->where('id',$id)->first();    
    return view('custom_view.edit_brand',compact('brand'));
 }
 public function update(Request $request){
    $id=$request->input('id');
    $brand= Brand::find($id);
    $brand->brand_name=$request->brand_name;
    $active=Input::has('active') ?  true : false;
    $brand->status=$active;
    $brand->save();
    return redirect('/home/manage_brand');
 }
 public function delete($id){
    Brand::find($id)->delete();    
    return redirect('/home/manage_brand');
 }

}
