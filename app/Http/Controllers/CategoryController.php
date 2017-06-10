<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
  public function store(Request $request){
   $category= new Category();
   $category->category_name=$request->category_name;
   $category->brand_name=$request->brand_name;	
   $active=Input::has('active') ?  true : false;
   $category->status=$active;
   $category->save();
   return redirect('/home/manage_category');
 }
 public function edit($id){
   $category= Category::find($id)->where('id',$id)->first();    
   return view('custom_view.edit_category',compact('category'));
 }
 public function update(Request $request){
  $id=$request->input('id');
  $category= Category::find($id);
  $category->category_name=$request->category_name;
  $category->brand_name=$request->brand_name;	
  $active=Input::has('active') ?  true : false;
  $category->status=$active;
  $category->save();
  return redirect('/home/manage_category');
}
public function delete($id){
 Category::find($id)->delete();    
 return redirect('/home/manage_category');
}
}
