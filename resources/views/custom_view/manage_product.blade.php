@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1> Product Listing</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Category Listing</div>
				<div class="panel-body">              		 
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Product name</th>
								<th style="text-align:center">Category</th>
								<th style="text-align:center">In Stock</th>
								<th style="text-align:center">Status</th> 
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($product as $products){
								?>
								<tr>
									<td><?php echo $products->product_name; ?></td>
									<td style="text-align:center"><?php echo $products->category_name; ?></td>
									<td style="text-align:center"><?php echo $products->stock; ?></td> 
									<td style="text-align:center">
										<?php 
										if($products->status==0){  ?>
										<button class="btn btn-danger">Inactive</button>
										<?php	
									}
									else{?>
									<button class="btn btn-success">Active</button>
									<?php  
								}
								?>					         	
							</td>
							<td style="text-align:center">  
								<a  href="<?=URL::to('/home/productlist_edit',array($products->id))?>"  class="btn btn-primary"><span class="glyphicon glyphicon-edit">Edit</a>
								<a  onclick="return check()" href="<?=URL::to('/home/productlist_delete',array($products->id))?>" class="btn btn-danger">
									<span class="glyphicon glyphicon-trash"></span>Detete</a>
								</td>
								
							</tr>
							<?php 
						} 
						?>		
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>


@stop
