@extends('includes.edits')

@section('edit_content')
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>VPN Username * :</label>
			<input type="text" value="{{ $data->vpnusername}}" name="vpnusername" placeholder="VPN Username" required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>VPN Password * :</label>
			<input type="text" value="{{ $data->vpnpassword}}" name="vpnpassword" placeholder="VPN Password" required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>MAC * :</label>
			<input type="text" value="{{ $data->mac}}" name="mac" placeholder="00:00:00:00:00" required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Type * :</label>
			<input type="text" value="{{ $data->type}}" name="type" placeholder="Phone - tablet .." required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Model * :</label>
			<input type="text" value="{{ $data->model}}" name="model" placeholder="Samsung - Iphone ..." required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>OS Version * :</label>
			<input type="text" value="{{ $data->os_version}}" name="os_version" placeholder="4.4.2" required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>App Version * :</label>
			<input type="text" value="{{ $data->app_version}}" name="app_version" placeholder="1.x.x" required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Support Pin * :</label>
			<input type="text" value="{{ $data->pin}}" name="pin" placeholder="000000000000" required  class="form-control"  >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Connect * :</label>
			<input type="text" value="{{ $data->last_connect}}" readonly name="last_connect" class="form-control" >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Disconnect * :</label>
			<input type="text" value="{{ $data->last_disconnect}}" readonly name="last_disconnect" class="form-control" >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Login * :</label>
			<input type="text" value="{{ $data->last_login}}" readonly name="last_login" class="form-control" >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Logout * :</label>
			<input type="text" value="{{ $data->last_logout}}" readonly name="last_logout"  class="form-control" >
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Online * :</label>
			<select name="active" class="form-control">
				<option {{ $data->online === 0 ? 'selected' : '' }} value="0">No</option>
				<option {{ $data->online === 1 ? 'selected' : '' }} value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Status * :</label>
			<select name="active" class="form-control">
				<option {{ $data->active === 0 ? 'selected' : '' }} value="0">No</option>
				<option {{ $data->active === 1 ? 'selected' : '' }} value="1">Yes</option>
			</select>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="form-group">
			<label>Note :</label>
			<textarea name="note" class="form-control" rows="3">{{ $data->note}}</textarea>
			</div>
		</div>
@stop
