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
							<a href="/stock">
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
						<form action="/stock" method="POST" enctype="multipart/form-data">
							@csrf
							<span class="section">Product Stock</span>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="ex. John f. Kennedy" required="required" />
								</div>
							</div>

							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Quantity <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="number" class='number' name="quantity" data-validate-minmax="10,100" required='required' placeholder="1">
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Price <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="number" class='number' name="price" data-validate-minmax="10,100" required='required' placeholder="125.000">
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Image<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" class='file' type="file" name="image" required='required'>
								</div>
							</div>
							<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">
									Description<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6">
									<textarea name="description" class="resizable_textarea form-control" placeholder="This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..."></textarea>
								</div>
							</div>
							<div class="ln_solid">
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='submit' class="btn btn-success">
											Add
										</button>
										<button type='reset' class="btn btn-danger">
											Reset
										</button>
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