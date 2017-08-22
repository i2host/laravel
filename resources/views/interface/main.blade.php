<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel @yield('title')</title>
    @include('interface.includes.header')

  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">

        <!-- page content -->
        <div class="col-md-12" role="main">
        @yield('main_content')
        </div>
        <!-- /page content -->

      </div>
    </div>

    @include('interface.includes.footer')
    
  </body>
</html>