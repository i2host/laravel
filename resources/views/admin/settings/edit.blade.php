@extends('admin.includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Code * :</label>
			<input type="text" name="code" value="{{ $data->code }}" placeholder="Name" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Main Langauge * :</label>
			<select name="main" class="form-control">
				<option {{ $data->main == 0 ? 'selected' : ''  }} value="0">No</option>
				<option {{ $data->main == 1 ? 'selected' : ''  }} value="1">Yes</option>
			</select>
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
