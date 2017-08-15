@extends('main')

@section('title','| Plans')
@section('subtitletitle','Plans')

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
                            <label>Name * :</label>
                            <input type="text" name="name" placeholder="Name" required class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Description * :</label>
                            <input type="text" name="description" placeholder="" required class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Duration * :</label>
                            <input type="text" name="duration" placeholder="x days" required class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Amount * :</label>
                            <input type="text" name="amount" placeholder="100" required class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Points * :</label>
                            <input type="text" name="points" placeholder="10" required class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Languages * :</label>
                            <select name="i18n_id" required class="form-control">
                                <option value="">Select</option>
                                @foreach ($i18ns as $i18n)
                                <option value="{{ $i18n->id }}">{{ $i18n->code }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            <label>Status * :</label>
                            <select name="active" class="form-control">
                                <option value="">Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
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
                        <th>Language</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Amount</th>
                        <th>Points </th>
                        <th>Sort</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>Language</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Duration</td>
                        <td>Amount</td>
                        <td>Points</td>
                        <td>Sort</td>
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
                        <td>{{ $data->i18n->code }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->duration }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->points }}</td>
                        <td>{{ $data->sort }}</td>
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