@extends('includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Name * :</label>
			<input type="text" name="name" value="{{ $data->name }}" required placeholder="Name" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label >Last Name * :</label>
			<input type="text" name="last_name" value="{{ $data->last_name }}" required placeholder="Last Name" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label >E-mail * :</label>
			<input type="text" name="email" value="{{ $data->email }}" required placeholder="Email" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Password :</label>
			<input type="text" name="password" placeholder="Password Optional" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Username :</label>
			<input type="text" name="username" value="{{ $data->username }}" placeholder="Username" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Premium * :</label>
			<select name="premium" class="form-control">
				<option value="">Select</option>
				<option {{ $data->premium == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $data->premium == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Active * :</label>
			<select name="active" class="form-control">
				<option {{ $data->active == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $data->active == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
@stop
