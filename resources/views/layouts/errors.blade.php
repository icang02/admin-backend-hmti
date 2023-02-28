<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard | HMTI</title>

  <!-- Bootstrap -->
  <link href="{{ asset('template') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('template') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('template') }}/vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset('template') }}/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- page content -->
      <div class="col-md-12">
        <div class="col-middle">
          @yield('children')
        </div>
      </div>
      <!-- /page content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('template') }}/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('template') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="{{ asset('template') }}/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="{{ asset('template') }}/vendors/nprogress/nprogress.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{ asset('template') }}/build/js/custom.min.js"></script>
</body>

</html>
