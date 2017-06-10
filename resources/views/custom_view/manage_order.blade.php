@extends('layouts.app')
@section('content')

<script> 
$(document).ready(function($) {
	$( '#table' ).searchable();
});

</script> 



<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1> Product Listing</h1><hr>
			<div class="panel panel-default" >

				<div class="panel-heading">Category Listing</div>
				<div class="panel-body">  
					<div class="form-inline">
						<label for="email">Search:</label>
						<input type="search" class="form-control" id="search" name="search" value="" placeholder="Search Book" autocomplete="off">						      						     
					</div> 
					<br>           		 
					<table class="table table-bordered" id="table">

						
						<thead>
							<tr>
								<th>#Id </th>
								<th style="text-align:center">Costomer Name</th>
								<th style="text-align:center">Date</th>
								<th style="text-align:center">Total</th> 
								<!-- <th style="text-align:center">Payment</th> -->
								<th style="text-align:center">Paid</th>
								<th style="text-align:center">Due</th>
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($order as $orders){
								?>
								<tr>
									<td><?php echo $orders->id; ?></td>
									<td><?php echo $orders->customer_name; ?></td>
									<td style="text-align:center"><?php echo $orders->date; ?></td>
									<td style="text-align:center"><?php echo $orders->total; ?></td>
									<!-- <td style="text-align:center"><?php echo $orders->payment; ?></td> --> 
									<td style="text-align:center"><?php echo $orders->paid; ?></td> 
									<td style="text-align:center"><?php echo $orders->due; ?></td> 					  
									<td style="text-align:center">  
										<a  href="<?=URL::to('home/order_list_edit',array($orders->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Edit</a>
										<a  href="<?=URL::to('home/order_list_print',array($orders->id))?>"  class="btn btn-success"><span class="glyphicon glyphicon-edit">Print</a>
										<a  onclick="return check()" href="<?=URL::to('home/order_list_delete',array($orders->id))?>" class="btn btn-danger">
											<span class="glyphicon glyphicon-trash"></span>Detete</a>
										</td>

									</tr>
									<?php 
								} 
								?>		

							</tbody>
						</table>
						<div class="pagination"><?php echo $order->links() ?></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	@stop
