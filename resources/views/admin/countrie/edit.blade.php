@extends('admin.includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="name">Name * :</label>
			<input type="text" name="name" value="{{ $data->name }}" id="name" class="form-control" required placeholder="Name">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="shortcode">Image * :</label>
			<input type="text" name="image" value="{{ $data->image }}" id="image" class="form-control" required placeholder="Image">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="name">Image Code * :</label>
			<input type="text" name="image_code" value="{{ $data->image_code }}" id="name" class="form-control" required placeholder="Image Code">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="shortcode">Premium * :</label>
			<select name="premium" class="form-control">
				<option value="">Select</option>
				<option {{ $data->premium == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $data->premium == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="name">Sort * :</label>
			<input type="text" name="sort" value="{{ $data->sort }}" id="name" class="form-control"  required placeholder="Sort">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label for="shortcode">Status * :</label>
			<select name="active" class="form-control">
				<option {{ $data->active == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $data->active == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
@stop
