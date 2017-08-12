@extends('main')

@section('title','| Devices - Users')
@section('subtitletitle','Devices - Users')

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
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>Premium</th>
                        <th>Active</th>
                        <th>OS Version</th>
                        <th>Type</th>
                        <th>App Version</th>
                        <th>Serial Number</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>E-mail</td>
                        <td>Username</td>
                        <td>Premium</td>
                        <td>Active</td>
                        <td>OS Version</td>
                        <td>Type</td>
                        <td>App Version</td>
                        <td>Serial Number</td>
                        <td>Active</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--start while !-->
                    @foreach ($datas as $data)
                    @foreach ($data->users as $user)
                    <tr data-pharse="{{ $data->id }}">
                        <td>
                            <input value="{{ $data->id }}" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->premium === 1 ? 'Yes' : 'No'}}</td>
                        <td>{{ $user->active === 1 ? 'Yes' : 'No'}}</td>
                        <td>{{ $data->os_version }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->app_version }}</td>
                        <td>{{ $data->serial_number }}</td>
                        <td>{{ $data->active === 1 ? 'Yes' : 'No'}}</td>
                    </tr>
                    @endforeach
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