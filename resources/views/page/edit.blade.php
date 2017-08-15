@extends('includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Title * :</label>
			<input type="text" name="title" value="{{ $data->title }}" placeholder="Page title" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Languages * :</label>
			<select name="i18n_id" class="form-control">
				<option value="">Select</option>
				@foreach ($i18ns as $i18n)
				<option {{ $i18n->id == $data->i18n_id ? 'selected' : ''  }} value="{{ $i18n->id }}">{{ $i18n->code }}</option>
				@endforeach
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Public * :</label>
			<select name="public" class="form-control">
				<option value="">Select</option>
				<option {{ $data->public == 0 ? 'selected' : ''  }}  value="0">No</option>
				<option {{ $data->public == 1 ? 'selected' : ''  }}  value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Status * :</label>
			<select name="active" class="form-control">
				<option value="">Select</option>
				<option {{ $data->active == 0 ? 'selected' : ''  }}  value="0">No</option>
				<option {{ $data->active == 1 ? 'selected' : ''  }}  value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="form-group">
			<label>Content * :</label>
			<textarea name="content" class="form-control" rows="3">{{ $data->content }}</textarea>
			</div>
		</div>
@stop
