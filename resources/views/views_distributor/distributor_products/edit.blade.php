@extends('layouts.master')
@section('title', 'UD. POTONG AYAM SONI')
@section('content')

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							<a href="/product-distributor">
								<i class="fa fa-arrow-circle-left"></i> Back
							</a>
						</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content">
						<form action="/product-distributor/{{$distributor_products->id}}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('put')
							<span class="section">Product Stock</span>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="names" value="{{$distributor_products->name}}" required="required" />
								</div>
							</div>

							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Quantity <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="number" class='number' name="quantity" data-validate-minmax="10,100" required='required' value="{{$distributor_products->quantity}}">
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Price <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="number" class='number' name="price" data-validate-minmax="10,100" required='required' value="{{$distributor_products->price}}">
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Image<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" class='file' type="file" name="file">
									<img src="{{ asset('/uploads/'.$distributor_products->image) }}" alt="" width="100px" height="100px">
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Description<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<textarea name="description" class="resizable_textarea form-control" placeholder="">{{$distributor_products->description}}</textarea>
								</div>
							</div>
							<div class="ln_solid">
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='submit' class="btn btn-warning">
											Edit
										</button>
										<a href="/product-distributor" class="btn btn-danger">
											Cancel
										</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection