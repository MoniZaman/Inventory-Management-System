@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1> Category Listing</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Brand Listing</div>
				<div class="panel-body">              		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/productlist/update')}}" enctype="multipart/form-data">
						<div class="form-group">
							<label for="email">Product name:</label>
							<input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" placeholder="Product name">
							<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
							<input name="id" type="hidden" value="{{$product->id }}"/>
						</div>	
						<div class="form-group">
							<label >Parent</label>
							<select name="category_name" class="form-control">
								<?php 
								foreach($category as $categorys){
									?>	
									<option value="{{$categorys->category_name}}"><?php echo $categorys->category_name; ?></option>
									
									<?php 
								}
								?>				                					              
							</select>
						</div>
						<div class="form-group">
							<label >Parent</label>
							<select name="brand_name" class="form-control">
								<?php 
								foreach($brand as $brands){
									?>	
									<option value="{{$brands->brand_name}}"><?php echo $brands->brand_name; ?></option>
									
									<?php 
								}
								?>				                					              
							</select>
						</div>
						<div class="form-group">
							<label for="email">Model Number:</label>
							<input type="text" class="form-control" name="model_number" value="{{$product->product_name}}" placeholder="brand name">
							
						</div>
						<div class="form-group">
							<label for="email">Stock:</label>
							<input type="text" class="form-control" name="stock" value="{{$product->stock}}" placeholder="brand name">
							
						</div>
						<div class="form-group">
							<label for="email">Price:</label>
							<input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="brand name">
							
						</div>				   
						<div class="checkbox">
							Status:<label><input type="checkbox" name="active" value="1" >Active</label>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop