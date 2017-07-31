@extends('includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="name">Name * :</label>
			<input type="text" name="name" value="{{ $name }}" id="name" class="form-control" required placeholder="Name">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="shortcode">Image * :</label>
			<input type="text" name="image" value="{{ $image }}" id="image" class="form-control" required placeholder="Image">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="name">Image Code * :</label>
			<input type="text" name="image_code" value="{{ $image_code }}" id="name" class="form-control" required placeholder="Image Code">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="shortcode">Premium * :</label>
			<select name="premium" class="form-control">
				<option value="">Select</option>
				<option {{ $premium == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $premium == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="name">Sort * :</label>
			<input type="text" name="sort" value="{{ $sort }}" id="name" class="form-control"  required placeholder="Sort">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="shortcode">Status * :</label>
			<select name="active" class="form-control">
				<option {{ $active == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $active == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
@stop
