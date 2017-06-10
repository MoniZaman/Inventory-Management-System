<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\wrapper;
use App\Order;
use App\Invoice;
use App\Customer;
use App\Product;
use Illuminate\Support\Facades\Input;


class OrderController extends Controller
{
  public function store(Request $request){
   $order= new Order();
   $order->customer_name=$request->customer_name;
   $order->customer_street=$request->customer_street;
   $order->customer_country=$request->customer_country;
   $order->customer_phone=$request->customer_phone;
   $order->date=$request->order_date;
   $order->total=$request->total;
   $order->payment=$request->payment_method;
   $order->paid=$request->paid;
   $order->due=$request->due;   		
   $order->save();


   $id=$order->id;
   if ($id>0) {
     for ($i=0; $i <count($order->product_id=$request->product_id); $i++) { 
      $invoice= new Invoice();
      $invoice->order_id=$order->id;
      $invoice->product_id=$request->product_id[$i];
      $invoice->dis=$request->dis[$i];
      $invoice->qty=$request->qty[$i];
      $invoice->price=$request->price[$i];
      $invoice->line_total=$request->line_total[$i];              
      $invoice->save();

      $id=$invoice->product_id;
      if ($id>0) {
        $product=Product::find($id);
        $stock=$product->stock;
        $current_stock=$stock-$invoice->qty;
        $product->stock=$current_stock;
        $product->save();
      }
    }
    
  }
  

  $customer= new Customer();
  $customer->order_id=$order->id;
  $customer->customer_name=$request->customer_name;
  $customer->street=$request->customer_street;
  $customer->country=$request->customer_country;
  $customer->phone=$request->customer_phone;	
  $customer->save();

  return redirect('/home/manage_order');
}
public function edit($id){
  $order=Order::find($id)->where('id',$id)->first();
  return view('custom_view.edit_order',compact('order'));
}

public function update(Request $request){
  $id=$request->input('id');
  $order= Order::find($id);
  $order->customer_name=$request->customer_name;
  $order->customer_street=$request->customer_street;
  $order->customer_country=$request->customer_country;
  $order->customer_phone=$request->customer_phone;
  $order->date=$request->order_date;
  $order->total=$request->total;
  $order->payment=$request->payment_method;
  $order->paid=$request->paid;
  $order->due=$request->due;      
  $order->save();


  
  if ($id>0) {
    $invoice=\DB::table('invoice')->where('order_id',$order->id)->first();
    $invoice_id=$invoice->id; 
    for ($i=0; $i <count($order->product_id=$request->product_id); $i++) { 
      $invoice=Invoice::find($invoice_id);
      $invoice->order_id=$order->id;
      $invoice->product_id=$request->product_id[$i];
      $invoice->dis=$request->dis[$i];
      $invoice->qty=$request->qty[$i];
      $invoice->price=$request->price[$i];
      $invoice->line_total=$request->line_total[$i];              
      $invoice->save();
      $invoice_id++;  
      
            //$invoice->save();

      
      $id=$invoice->product_id;
      if ($id>0) {
        $product=Product::find($id);
        $stock=$product->stock;
        $current_stock=$stock-$invoice->qty;
        $product->stock=$current_stock;
        $product->save();
      }
    }
    
  }
  

      // $customer= new Customer();
      // $customer->order_id=$id;
      // $customer->customer_name=$request->customer_name;
      // $customer->street=$request->customer_street;
      // $customer->country=$request->customer_country;
      // $customer->phone=$request->customer_phone;  
      // $customer->save();

  return redirect('/home/manage_order/');
}


public function delete($id){
  Order::find($id)->delete();
  if ($id>0) {
    Invoice::find($id)->where('order_id',$id)->delete();

            //InvoiceModel::where('order_id',$id)->get()->delete();
            //$invoice=\DB::table('invoice')->where('order_id',$id)->get();
            //$invoice->delete();
  }
          // if($id>0){
          //     Customer::find($id)->where('order_id',$id)->get()->delete();
          // }    
  return redirect('/home/manage_order');
}


public function print_invoice($id){

  $order=Order::find($id)->where('id',$id)->first();
  $pdf = \PDF::loadView('custom_view.print_invoice', compact('order'));
      //return $pdf->stream('invoice.pdf');
  return $pdf->download('invoice.pdf');
}



}
