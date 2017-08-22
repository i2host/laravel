<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel @yield('title')</title>
    @include('admin.includes.header')

  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        @include('admin.includes.sidebar')
        @include('admin.includes.nav')
        <!-- page content -->
        <div class="right_col" role="main">
        @yield('main_content')
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <input type="hidden" name="baseurl" value="{{ url()->current() }}"> 
    <input type="hidden" name="upload_path" value="{{ route('admin.upload.submit') }}">
    <input type="hidden" name="get_upload" value="{{ route('admin.upload') }}">
    @include('admin.includes.footer')
  </body>
</html>