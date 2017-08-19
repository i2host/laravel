@extends('admin.includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Plan * :</label>
			<select name="plan_id" required class="form-control">
				<option value="">Select</option>
				@foreach ($plans as $plan)
				<option {{ $data->plan_id === $plan->id ? 'selected' : '' }} value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->duration }} Days</option>
				@endforeach
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>User * :</label>
			<select name="user_id" id="choice" required class="form-control">
				<option value="">Select</option>
				@foreach ($users as $user)
				<option {{ $data->user_id === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }} - {{ $user->last_name }}</option>
				@endforeach
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Paid by * :</label>
			<select name="paid_by" required class="form-control">
				<option value="">Select</option>
				<option {{ $data->paid_by == 0 ? 'selected' : ''  }} value="0">Cash</option>
				<option {{ $data->paid_by == 1 ? 'selected' : ''  }} value="1">Points</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Start Date * :</label>
			<input type="text" name="start_date" id="date" value="{{ $data->start_date  }}" required class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>End Date  * :</label>
			<input type="text" readonly name="end_date" value="{{ $data->end_date }}" class="form-control">
			</div>
		</div>
@stop
