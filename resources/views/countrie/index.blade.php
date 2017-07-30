@extends('main')

@section('title','| Countries')

@section('main_content')
          <div class="">
            <!-- start of page !-->

            <div class="page-title">
              <div class="title_left">
                <h3>Countries</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>Add</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- action="filename" the file name that handel the forms add/edit/delete  -->
                    <form method="POST" action="http://localhost:8000/countries" id="addformvalid">
                    
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                        <label for="name">Name * :</label>
                        <input type="text" id="name" class="form-control" name="name" required placeholder="Name">
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                        <label for="shortcode">Image * :</label>
                        <input type="text" id="image" class="form-control" name="image" required placeholder="Short Code">
                        </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                        <button type="submit" class="btn btn-default">Add</button>
                        </div>

                        {{ csrf_field() }}
                        <input type="hidden" value="add" name="type">
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
                <div class="x_content" multiedit-file="http://localhost:8000/countries">
                <table id="datatable-buttons2"  class="table table-striped rightmenu table-bordered bulk_action multisp">
                    <thead>
                    <tr>
                        <th style="width:25px;"><input type="checkbox" name="c1" value="dontcount" id="check-all" class="flat"></th>
                        <th>Name</th>
                        <th>Short Code</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td id="nosearch"></td>
                        <td>Name</td>
                        <td>Short Code</td>
                        <td>Status</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--start while !-->
                    <tr data-file="http://localhost:8000/countries" data-pharse="1/edit">
                        <td>
                            <input value="<!--data id !-->" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>2</td>
                        <td>2</td>
                        <td>3</td>
                    </tr>

                    <tr data-file="http://localhost:8000/countries" data-pharse="2/edit">
                        <td>
                            <input value="<!--data id !-->" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr>

                    <tr data-file="http://localhost:8000/countries" data-pharse="3/edit">
                        <td>
                            <input value="<!--data id !-->" type="checkbox" name="table_records[]" class="flat">
                        </td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                    </tr>

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