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
			<label>Description * :</label>
			<input type="text" name="description" value="{{ $data->description }}" placeholder="Description" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Duration * :</label>
			<input type="text" name="duration" value="{{ $data->duration }}" placeholder="x Days" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Amount * :</label>
			<input type="text" name="amount" value="{{ $data->amount  }}" placeholder="100" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Points  * :</label>
			<input type="text" name="points" value="{{ $data->points }}" placeholder="10" required class="form-control">
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
