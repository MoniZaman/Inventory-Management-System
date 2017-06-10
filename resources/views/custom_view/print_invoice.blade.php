<!DOCTYPE html>
<html>
<head>
 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
  <div class="row">
   <div class="col-lg-10">
    <strong>Invoice #{{$order->id}}</strong><br>
    <strong>Date #{{$order->date}}</strong><br>
    <strong>Grand Total #{{$order->total}}</strong><br><br>


    <strong>{{$order->customer->customer_name}}</strong><br>
    <strong>{{$order->customer->street}}</strong><br>
    <strong>{{$order->customer->country}}</strong><br>
    <strong>{{$order->customer->phone}}</strong><br>
    <table class="table table-bordered">
      <thead>
        <tr>
         <th>Item ID</th>                                    
         <th style="text-align:center">Description</th>                            
         <th style="text-align:center">Qty</th>
         <th style="text-align:center">Price</th>
         <th style="text-align:center">Line Total</th>
       </tr>      
     </thead>
     <tbody>
      @foreach($order->invoices as $invoice )                                  
      <tr>
        <td> {{$invoice->id}}</td>
        <td style="text-align:center">{{$invoice->product->product_name}}</td>
        <td style="text-align:center">{{$invoice->qty}}</td>  
        <td style="text-align:center">{{$invoice->price}}</td>  
        <td style="text-align:center">{{$invoice->line_total}}</td>  
      </tr>
      @endforeach
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
         <strong style="text-align:right">Grand Total:{{$order->total}}</strong>    	
       </td>
       
     </tr>
   </tbody>
 </table>
 
</div>

</div>
</body>
</html>