@extends('main')

@section('title','| Countries')
@section('subtitletitle','Countries')

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
                            <label for="name">Name * :</label>
                            <input type="text" id="name" class="form-control" name="name" required placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="shortcode">Image * :</label>
                            <input type="text" id="image" class="form-control" name="image" required placeholder="Image">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="name">Image Code * :</label>
                            <input type="text" id="name" class="form-control" name="image_code" required placeholder="Image Code">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label for="shortcode">Premium * :</label>
                            <select name="premium" class="form-control">
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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Image Code</th>
                        <th>Sort</th>
                        <th>Premium</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Image Code</td>
                        <td>Sort</td>
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
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->image }}</td>
                        <td>{{ $data->image_code }}</td>
                        <td>{{ $data->sort }}</td>
                        <td>{{ $data->premium === 1 ? 'Yes' : 'No' }}</td>
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