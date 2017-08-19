@extends('admin.includes.edits')

@section('edit_content')
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h4>Device Information</h4>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>VPN username * :</label>
			<input type="text" readonly value="{{ $data->device->vpnusername}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>VPN password * :</label>
			<input type="text" readonly value="{{ $data->device->vpnpassword}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Mac * :</label>
			<input type="text" readonly value="{{ $data->device->mac}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>type * :</label>
			<input type="text" readonly value="{{ $data->device->type}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Model * :</label>
			<input type="text" readonly value="{{ $data->device->model}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>OS version * :</label>
			<input type="text" readonly value="{{ $data->device->os_version}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>App Version * :</label>
			<input type="text" readonly value="{{ $data->device->app_version}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Create at * :</label>
			<input type="text" readonly value="{{ $data->device->created_at}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Connect * :</label>
			<input type="text" readonly value="{{ $data->device->last_connect}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Disconnect * :</label>
			<input type="text" readonly value="{{ $data->device->last_disconnect}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Login * :</label>
			<input type="text" readonly value="{{ $data->device->last_login}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Last Logout * :</label>
			<input type="text" readonly value="{{ $data->device->last_logout}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Support Pin * :</label>
			<input type="text" readonly value="{{ $data->device->pin}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Active * :</label>
			<input type="text" readonly value="{{ ($data->device->active === 1) ? 'Yes' : 'No' }}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Online * :</label>
			<input type="text" readonly value="{{ ($data->device->online === 1) ? 'Yes' : 'No' }}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
			<label>Updated at * :</label>
			<input type="text" readonly value="{{ $data->device->updated_at}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="form-group">
			<label>Note :</label>
			<textarea name="note" readonly class="form-control" rows="3">{{ $data->device->note}}</textarea>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h4>Sessions Information</h4>
		</div>
		<div class="col-lg-12 col-mg-12 col-sm-12">
			<table class="table table-striped">
				<thead>
					<tr>
					<th>#</th>
					<th>C IP</th>
					<th>C Port</th>
					<th>V IP</th>
					<th>V Port</th>
					<th>S IP</th>
					<th>S Name</th>
					<th>Connect</th>
					<th>Disconnect</th>
					<th>R Data</th>
					<th>S Data</th>
					<th>Create</th>
					<th>Update</th>
					</tr>
				</thead>
				@foreach ($sessions as $session)
				<tr>
					<td>{{ $session->id}}</td>
					<td>{{ $session->client_ip}}</td>
					<td>{{ $session->client_port}}</td>
					<td>{{ $session->vpn_ip}}</td>
					<td>{{ $session->vpn_port}}</td>
					<td>{{ $session->server_ip}}</td>
					<td>{{ $session->server->name}}</td>
					<td>{{ $session->connect_time}}</td>
					<td>{{ $session->disconnect_time}}</td>
					<td>{{ $session->recived_data}}</td>
					<td>{{ $session->sent_data}}</td>
					<td>{{ $session->created_at}}</td>
					<td>{{ $session->updated_at}}</td>
				</tr>
				@endforeach
			</table>
		</div>
@stop
