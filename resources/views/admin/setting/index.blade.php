@extends('admin.main')

@section('title','| Settings')
@section('subtitletitle','Settings')

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
                            <input type="text" name="name" required placeholder="Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Value * :</label>
                            <input type="text" name="value" required placeholder="Value" class="form-control">
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
                        <th>Name</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>Name</td>
                        <td>Value</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--start while !-->
                    @foreach ($datas as $data)
                    <tr data-pharse="{{ $data->id }}">
                        <td>
                            <input value="{{ $data->id }}" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->value }}</td>
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