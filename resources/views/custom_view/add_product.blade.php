@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1> Add Product</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Add Product</div>
				<div class="panel-body">              		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/productlist/store')}}" enctype="multipart/form-data">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Product  Name</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="product_name" value="" placeholder="Product name">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
							</div>
						</div>	
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Category Name</label>
                            <div class="col-md-6">
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
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Brand Name</label>
                            <div class="col-md-6">
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
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Model Number</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="model_number" value="" placeholder="brand name">
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Stock</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="stock" value="" placeholder="brand name">
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="price" value="" placeholder="brand name">
							</div>
						</div>	
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Status</label>
                            <div class="col-md-1">
								<input class="form-control "type="checkbox" name="active" value="1" >
							</div>
						</div>			   
						<!-- <div class="checkbox">
							Status:<label><input type="checkbox" name="active" value="1" >Active</label>
						</div> -->
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