@extends('admin.includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Name * :</label>
			<input type="text" name="name" value="{{ $data->name }}" placeholder="Name" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Value * :</label>
			<input type="text" name="value" value="{{ $data->value }}" placeholder="Value" required class="form-control">
			</div>
		</div>


@stop
