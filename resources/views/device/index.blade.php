@extends('main')

@section('title','| Devices')
@section('subtitletitle','Devices')

@section('main_content')
          <div class="">
            <!-- start of page !-->

            @include('includes.subpagetitlearea')

            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>Add</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- action="filename" the file name that handel the forms add/edit/delete  -->
                    <form method="POST" action="{{ url()->current() }}" id="addformvalid">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>VPN Username * :</label>
                            <input type="text" name="vpnusername" placeholder="VPN Username" required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>VPN Password * :</label>
                            <input type="text" name="vpnpassword" placeholder="VPN Password" required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>MAC * :</label>
                            <input type="text" name="mac" placeholder="00:00:00:00:00:00 or 00-00-00-00-00-00" required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Type * :</label>
                            <input type="text" name="type" placeholder="Phone - tablet .." required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Model * :</label>
                            <input type="text" name="model" placeholder="Samsung - Iphone ..." required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>OS Version * :</label>
                            <input type="text" name="os_version" placeholder="4.x.x" required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>App Version * :</label>
                            <input type="text" name="app_version" placeholder="1.x.x" required  class="form-control"  >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Status * :</label>
                            <select name="active" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <label>Note :</label>
                            <textarea name="note" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="button" onclick="upload_modal()" name="" class="btn btn-primary">Upload</button>
                        </div>

                        {{ csrf_field() }}
                    </form>

                </div>
                </div>
            </div>
        </div>


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
                        <th>MAC</th>
                        <th>type</th>
                        <th>Model</th>
                        <th>OS</th>
                        <th>App</th>
                        <th>Connect</th>
                        <th>Disconnect </th>
                        <th>Logout</th>
                        <th>Login</th>
                        <th>Pin</th>
                        <th>Note</th>
                        <th>Online</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>MAC</td>
                        <td>type</td>
                        <td>Model</td>
                        <td>OS</td>
                        <td>App</td>
                        <td>Connect</td>
                        <td>Disconnect </td>
                        <td>Logout</td>
                        <td>Login</td>
                        <td>Pin</td>
                        <td>Note</td>
                        <td>Online</td>
                        <td>Active</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--start while !-->
                    @foreach ($datas as $data)
                    <tr data-pharse="{{ $data->id }}">
                        <td>
                            <input value="{{ $data->id }}" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>{{ $data->mac }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->model }}</td>
                        <td>{{ $data->os_version }}</td>
                        <td>{{ $data->app_version }}</td>
                        <td>{{ $data->last_connect }}</td>
                        <td>{{ $data->last_disconnect }}</td>
                        <td>{{ $data->last_login }}</td>
                        <td>{{ $data->last_logout }}</td>
                        <td>{{ $data->pin }}</td>
                        <td>{{ $data->note }}</td>
                        <td>{{ $data->online === 1 ? 'Yes' : 'No'}}</td>
                        <td>{{ $data->active === 1 ? 'Yes' : 'No'}}</td>
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