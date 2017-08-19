@extends('admin.main')

@section('title','| Plans')
@section('subtitletitle','Plans')

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
                            <label>Plan * :</label>
                            <select name="plan_id" required class="form-control">
                                <option value="">Select</option>
                                @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->duration }} Days</option>
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
                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Paid by * :</label>
                            <select name="paid_by" required class="form-control">
                                <option value="">Select</option>
                                <option value="0">Cash</option>
                                <option value="1">Points</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Start date * :</label>
                            <input type="text" name="start_date" id="date" required placeholder="" class="form-control">
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
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Plan</th>
                        <th>Duration</th>
                        <th>Paid By</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Plan</td>
                        <td>Duration</td>
                        <td>Paid By</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--start while !-->
                    @foreach ($datas as $data)
                    <tr data-pharse="{{ $data->id }}">
                        <td>
                            <input value="{{ $data->id }}" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->last_name }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td>{{ $data->plan->name }}</td>
                        <td>{{ $data->plan->duration }}</td>
                        <td>{{ $data->paid_by === 1 ? 'Points' : 'Cash' }}</td>
                        <td>{{ $data->start_date }}</td>
                        <td>{{ $data->end_date }}</td>
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