<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>E-Voting | @yield('title')</title>
  
  @stack('style')
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/adminLTE/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('vendor.adminLTE.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('vendor.adminLTE.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @yield('header')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <span>
      Made with <i class="fa fa-heart pulse" style="color: red"></i> in <a href="https://www.google.com/maps/place/Indonesia/@-3.6878662,113.8842,5.25z/data=!4m5!3m4!1s0x2c4c07d7496404b7:0xe37b4de71badf485!8m2!3d-0.789275!4d113.921327" target="_blank">Indonesia</a>
    </span>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminLTE/dist/js/demo.js')}}"></script>

<!-- jQuery -->
<script src="{{ asset('/adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/adminLTE/dist/js/adminlte.min.js')}}"></script>
@stack('scripts')
</body>
</html>
