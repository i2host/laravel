@extends('includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Name * :</label>
			<input type="text" name="name" value="{{ $data->name }}" placeholder="Name" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Server IP * :</label>
			<input type="text" name="server_ip" value="{{ $data->server_ip }}" placeholder="0.0.0.0" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Type * :</label>
			<select name="file_type" class="form-control">
				<option value="">Select</option>
				<option {{ $data->file_type == 'UDP' ? 'selected' : '' }} value="UDP">UDP</option>
				<option {{ $data->file_type == 'TCP' ? 'selected' : '' }} value="TCP">TCP</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>File * :</label>
			<input type="text" name="file" value="{{ $data->file }}" placeholder="File" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Country * :</label>
			<select name="countrie_id" class="form-control">
				<option value="">Select</option>
				@foreach ($countries as $countrie)
				<option {{ $countrie->name == $data->countrie->name ? 'selected' : ''  }} value="{{ $countrie->id }}">{{ $countrie->name }}</option>
				@endforeach
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
			<label>Sort * :</label>
			<input type="text" name="sort" value="{{ $data->sort }}" placeholder="Sort" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Status * :</label>
			<select name="active" class="form-control">
				<option {{ $data->active == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $data->active == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
			</div>
		</div>
@stop
