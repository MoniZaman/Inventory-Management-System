@extends('layouts.app')
@section('content')
<script type="text/javascript">
function totalamount(){
	var t=0;
	$('.amount').each(function(i,e){
		var amt=$(this).val()-0;
		t+=amt;
	});
	$('.sub_total').val(t);
	var sub_vat=(t*10)/100;
	$('.vat').val(sub_vat);
	$('.total').val(t);
	$('.due').val(t);
	
}

$(function(){

	$('.add').click(function(){
		var product=$('.product_id').html();
		var n =($('.body tr').length-0)+1;
		var tr= '<tr class="tbody"><th class="no">'+n+'</th>'+
		'<td><select name="product_id[]" class="form-control product_id">'+product+' </select></td>'+
		'<td><input type="text" name="qty[]" class="qty form-control" placeholder="Qut" autocomplete="off"></td>'+
		'<td><input type="text" name="price[]" class="price form-control"  placeholder="Price" autocomplete="off"></td>'+
		'<td><input type="text" name="dis[]" class="dis form-control"  placeholder="Price" autocomplete="off"></td>'+
		'<td><input type="text" name="line_total[]" class="amount form-control"  placeholder="amount" autocomplete="off"></td>'+				        
		'<td style="text-align:center"><a class="btn btn-primary delete"> <span class="glyphicon glyphicon-trash"></span>Detete</a></td></tr>';           
		
		$('.body').append(tr);
		
	});
	$('.body').delegate('.delete','click',function(){
		$(this).parent().parent().remove();
		totalamount();
	});

	$('.body').delegate('.product_id','change',function(){
		var tr=$(this).parent().parent();
		var price=tr.find('.product_id option:selected').attr('data-price');
		tr.find('.price').val(price);
		tr.find('.amount').val(price);
			//var tr=$(this).parent().parent();
			var qty=tr.find('.qty').val();
			var dis=tr.find('.dis').val();
			var price=tr.find('.price').val();

			var total=(qty*price)-((qty*price*dis)/100);
			tr.find('.amount').val(price);
			totalamount();
			
		});

	$(".body").delegate(".qty,.dis","keyup",function(){
		var tr=$(this).parent().parent();
		var qty=tr.find('.qty').val();
		var dis=tr.find('.dis').val();
		var price=tr.find('.price').val();

		var total=(qty*price)-((qty*price*dis)/100);
		tr.find('.amount').val(total);
		totalamount();
	});

	$( ".discount,.getmoney" ).keyup(function() {	
		var vat=$('.mydivclass').find('.vat').val();
		var sub_total=$('.mydivclass').find('.sub_total').val();
		var getmoney=$('.mydivclass').find('.getmoney').val();	
		var discount=$('.mydivclass').find('.discount').val();	
		
		var total=parseInt(sub_total)+parseFloat(vat);
		var total=total-((total*discount)/100);
		$('.total').val(parseInt(total));
		var due=total-getmoney;
		$('.due').val(parseInt(due));
	});



	var tr=$(this).parent().parent();
	var qty=tr.find('.qty').val();
	var dis=tr.find('.dis').val();
	var price=tr.find('.price').val();
	var total=(qty*price)-((qty*price*dis)/100);
	tr.find('.amount').val(total);
	totalamount();


});	
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1> Edit Order</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Edit Order</div>
				<div class="panel-body">              		 
					<form  class="form-horizontal warn-on-exit" method="post" action="{{URL::to('/home/order_list/update')}}" enctype="multipart/form-data">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Order Date</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="order_date" value="{{$order->date}}" placeholder="{{$order->date}}" autocomplete="off">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
							</div>
						</div>	 
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Customer Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="customer_name" value="{{$order->customer_name}}" placeholder="Customer name" autocomplete="off">
								<input type="hidden" class="form-control" name="id" value="{{$order->id}}">
							</div>
						</div> 
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Street</label>
							<div class="col-md-6">	
								<input type="text" class="form-control" name="customer_street" value="{{$order->customer_street}}" placeholder="Customer name" autocomplete="off">
							</div>
						</div> 
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Country </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="customer_country" value="{{$order->customer_country}}" placeholder="Customer name" autocomplete="off">
							</div>
						</div> </br>	
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="customer_phone" value="{{$order->customer_phone}}" placeholder="Customer name" autocomplete="off">
							</div>
						</div>	
						<br>
						<div class="form-group">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#Id </th>
										<th style="text-align:center">Product</th>
										<th style="text-align:center">Qut</th>
										<th style="text-align:center">price</th>
										<th style="text-align:center">Discount</th>
										<th style="text-align:center">Amount</th>  
										<th style="text-align:center"> <input type="button" class="btn btn-primary add" name="" value="+" sautocomplete="off"></th> 
										
									</tr>
								</thead>
								<tbody class="body">
									<?php 
									$i=0;
									foreach($order->invoices as $invoice)
									{
										$i++;
										?>	
										
										<tr >
											<th class="no"><?php echo $i; ?></th>
											<td>
												<select name=" product_id[]" class="form-control product_id">
													<option selected>{{$order->product_name}}</option>
													@foreach($product as $products)
													@if ($products->stock>0)					
													<!-- {{$products->id}} -->
													<option data-price="{{$products->price}}" value="{{$products->id}}">{{$products->product_name}}</option>
													@endif
													
													@endforeach			                					              
												</select>
											</td>
											<td><input type="text" name="qty[]" class="qty form-control" placeholder="Qut" value="<?php  echo $invoice->qty;?>" autocomplete="off"></td>
											<td><input type="text" name="price[]" class="price form-control"  placeholder="Price" value="<?php echo $invoice->price;?>" autocomplete="off"></td>
											<td><input type="text" name="dis[]" class="dis form-control"  placeholder="Price" value="<?php echo $invoice->dis;?>" autocomplete="off"></td>
											<td><input type="text" name="line_total[]" class="amount form-control"  placeholder="amount" value="<?php echo $invoice->line_total;?>" autocomplete="off"></td>				        
											<td style="text-align:center"><a class="btn btn-primary "> <span class="glyphicon glyphicon-trash"></span>Detete</a></td>				        
											
										</tr>	
										<?php 
									}
									?>						       
								</tbody>
							</table>
						</div>	
						<!-- 	<div class="mydivclass form-group">				      
						      Sub Total:<b class="sub_total">0</b>
						  </div> -->
						    <div class="mydivclass form-group">
						  	<label class="col-md-4 control-label" for="email">Sub Total:</label>
						  	<div class="col-md-6">
						  		<div class="input-group">
						  			<div class="input-group-addon">$</div>
						  			<input type="text" class="sub_total form-control" name="sub_total" value="" placeholder="brand name" autocomplete="off">
						  		</div>
						  	</div>
						  </div> 
						  <div class="mydivclass form-group">
						  	<label class="col-md-4 control-label" for="label">Vat(5%):</label>
						  	<div class="col-md-6">
						  		<div class="input-group">	
						  			<div class="input-group-addon">$</div>
						  			<input type="text" class="vat form-control" name="vat" value="" placeholder="brand name" autocomplete="off">
						  		</div>
						  	</div>
						  </div>
						  <div class="mydivclass form-group">
						  	<label class="col-md-4 control-label" for="email">Sub Total:</label>
						  	<div class="col-md-6">
						  		<div class="input-group">
						  			<div class="input-group-addon">$</div>
						  			<input type="text" class="sub_total form-control" name="sub_total" value="" placeholder="brand name" autocomplete="off">
						  		</div>
						  	</div>
						  </div> 

						  <div class="mydivclass form-group">
						  	<label class="col-md-4 control-label" for="label">Vat(5%):</label>
						  	<div class="col-md-6">
						  		<div class="input-group">	
						  			<div class="input-group-addon">$</div>
						  			<input type="text" class="vat form-control" name="vat" value="" placeholder="brand name" autocomplete="off">
						  		</div>
						  	</div>
						  </div> 

						  <div class="mydivclass form-group">
						  	<label class="col-md-4 control-label" for="label">Discount:</label>
						  	<div class="col-md-6">
						  		<div class="input-group">
						  			<div class="input-group-addon">$</div>
						  			<input type="text" class="discount form-control" name="discount" value="" placeholder="brand name" autocomplete="off">
						  		</div>
						  	</div>	
							</div>
						  	<div class="mydivclass form-group">
						  		<label class="col-md-4 control-label" for="label">Net Total:</label>
						  		<div class="col-md-6">
						  			<div class="input-group">
						  				<div class="input-group-addon">$</div>
						  				<input type="text" class="total form-control" name="total" value="{{$order->total}}" placeholder="Net Total" autocomplete="off">						     
						  			</div>
						  		</div>
						  	</div> 
						  	<div class="mydivclass form-group">
						  		<label class="col-md-4 control-label" for="label">Paid:</label>
						  		<div class="col-md-6">
						  			<div class="input-group">
						  				<div class="input-group-addon">$</div>
						  				<input type="text" class="getmoney form-control" name="paid" value="{{$order->paid}}" placeholder="Paid" autocomplete="off">	
						  			</div>
						  		</div>
						  	</div>

						  	<div class="mydivclass form-group">
						  		<label class="col-md-4 control-label" class="" >Due:</label>
						  		<div class="col-md-6">
						  			<div class="input-group">
						  				<div class="input-group-addon">$</div>
						  				<input type="text" class="due form-control" name="due" value="{{$order->due}}" placeholder="brand name" autocomplete="off">						     
						  			</div>
						  		</div>
						  	</div>		   
						  	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						  		<label for="name" class="col-md-4 control-label">Payment Method</label>
						  		<div class="col-md-6">
						  			<select name="payment_method" class="form-control">							        
						  				<option value="cash">cash</option>	
						  				<option value="card">card</option>	
						  				<option value="cash">cash</option>	
						  				<option value="cheque">cheque</option>		 										                					              
						  			</select>
						  		</div>
						  	</div>
						  	<div class="form-group">
						  		<div class="col-md-6 col-md-offset-4">
						  			<button type="submit" class="btn btn-primary">
						  				<i class="fa fa-btn fa-user"></i> Submit
						  			</button>
						  		</div>    
						  	</div>
						  </form>
						</div>
					</div>
				</div>
			</div>
		</div>


		@stop