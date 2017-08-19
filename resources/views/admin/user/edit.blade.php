@extends('admin.includes.edits')

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
			<label>Type * :</label>
			<select name="type" class="form-control">
				<option value="">Select</option>
				<option {{ $data->type == 1 ? 'selected' : ''  }} value="1">Basic</option>
				<option {{ $data->type == 0 ? 'selected' : ''  }} value="0">Facebook</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Login :</label>
			<input type="text" readonly value="{{ $data->last_login }}" name="last_login" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Logout :</label>
			<input type="text" readonly value="{{ $data->last_logout }}" name="last_logout" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Points * :</label>
			<input type="text" value="{{ $data->points }}" name="points" placeholder="Nnumber of points" class="form-control" required >
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
			<label>Subscription End :</label>
			<input type="text" name="subscription_end" value="{{ $data->subscription_end }}" id="date" class="form-control" >
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="form-group">
			<label>Note :</label>
			<textarea name="note" class="form-control" rows="5">{{ $data->note }}</textarea>
			</div>
		</div>
@stop
