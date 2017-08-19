@extends('admin.main')

@section('title','| Users')
@section('subtitletitle','Users')
@section('main_content')
          <div class="">
            <!-- start of page !-->

            @include('admin.includes.subpagetitlearea')

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
                            <label>Name * :</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Last Name * :</label>
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control"  required >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="email">E-mail * :</label>
                            <input type="text" name="email" placeholder="Email" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Password * :</label>
                            <input type="text" name="password" placeholder="Password" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Type * :</label>
                            <select name="type" class="form-control">
                                <option value="">Select</option>
                                <option value="1">Basic</option>
                                <option value="0">Facebook</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Points * :</label>
                            <input type="text" value="0" name="points" placeholder="Nnumber of points" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Premium * :</label>
                            <select name="premium" class="form-control">
                                <option value="">Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Active * :</label>
                            <select name="active" class="form-control">
                                <option value="">Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                        <button type="submit" class="btn btn-default">Add</button>
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
                        <th>E-mail/Facebook</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Type</th>
                        <th>Points</th>
                        <th>Subscription End</th>
                        <th>Last Logout</th>
                        <th>Last Login </th>
                        <th>Note</th>
                        <th>Premium</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>E-mail/Facebook</td>
                        <td>Username</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Type</td>
                        <td>Points</td>
                        <td>Subscription End</td>
                        <td>Last Logout</td>
                        <td>Last Login </td>
                        <td>Note</td>
                        <td>Premium</td>
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
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->last_name }}</td>
                        <td>{{ $data->type === 1 ? 'Basic' : 'Facebook' }}</td>
                        <td>{{ $data->points }}</td>
                        <td>{{ $data->subscription_end }}</td>
                        <td>{{ $data->last_logout  }}</td>
                        <td>{{ $data->last_login  }}</td>
                        <td>{{ $data->note }}</td>
                        <td>{{ $data->premium === 1 ? 'Yes' : 'No' }}</td>
                        <td>{{ $data->active === 1 ? 'Yes' : 'No'}}</td>
                    </tr>
                    @endforeach
                    <!--end while !-->
                    </tbody>
                </table>

                <!-- include modals !-->
                @include('admin.includes.modal')
                
                </div>
            </div>
            </div>
        </div>

        <!-- end of page !-->
        </div>



@stop