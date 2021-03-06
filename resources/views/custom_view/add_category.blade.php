@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<h1>Add Category</h1><hr>
			<div class="panel panel-default" >
				
				<div class="panel-heading">Add Category</div>
				<div class="panel-body">              		 
					<form method="post" class="form-horizontal" role="form"  action="{{URL::to('/home/categorylist/store')}}" enctype="multipart/form-data">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Category Name</label>
                            <div class="col-md-6">
								<input type="text" class="form-control" name="category_name" value="" placeholder="category name">
								<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Parent Category Name</label>
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
                            <label for="name" class="col-md-4 control-label">Status</label>
                            <div class="col-md-1">
								<input class="form-control "type="checkbox" name="active" value="1" >
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