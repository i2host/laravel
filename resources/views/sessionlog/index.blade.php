@extends('main')

@section('title','| Sessions Logs')
@section('subtitletitle','Sessions Logs')

@section('main_content')
          <div class="">
            <!-- start of page !-->

        @include('includes.subpagetitlearea')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <table id="datatable-buttons2"  class="table table-striped rightmenu table-bordered bulk_action multisp">
                    <thead>
                    <tr>
                        <th style="width:25px;"><input type="checkbox" name="c1" value="dontcount" id="check-all" class="flat"></th>
                        <th>Mac</th>
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
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>MAC</td>
                        <td>C IP</td>
                        <td>C Port</td>
                        <td>V IP</td>
                        <td>V Port</td>
                        <td>S IP</td>
                        <td>S Name</td>
                        <td>Connect</td>
                        <td>Disconnect</td>
                        <td>R Data</td>
                        <td>S Data</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--start while !-->
                    @foreach ($datas as $data)
                    <tr data-pharse="{{ $data->id }}">
                        <td>
                            <input value="{{ $data->id }}" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>{{ $data->device->mac }}</td>
                        <td>{{ $data->client_ip }}</td>
                        <td>{{ $data->client_port }}</td>
                        <td>{{ $data->vpn_ip }}</td>
                        <td>{{ $data->vpn_port }}</td>
                        <td>{{ $data->server_ip }}</td>
                        <td>{{ $data->server->name }}</td>
                        <td>{{ $data->connect_time }}</td>
                        <td>{{ $data->disconnect_time }}</td>
                        <td>{{ $data->recived_data }}</td>
                        <td>{{ $data->sent_data }}</td>
                    </tr>
                    @endforeach
                    <!--end while !-->
                    </tbody>
                </table>

                <!-- include modals !-->
                @include('includes.modal')
                
                </div>
            </div>
            </div>
        </div>
        <!-- end of page !-->
        </div>
@stop