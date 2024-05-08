<!DOCTYPE html>
<html lang="en">
<head>
@include('head')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
  <!-- /.navbar -->
  @include('navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
        @include('sidebar')
      
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('footer')
  <!-- Main Footer -->

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Your custom script -->
<!-- <script src="{{ asset('customjs/company.js') }}"></script> -->
<!-- <script src="{{ asset('customjs/employ.js') }}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="{{ asset('customjs/company-list.js') }}"></script> -->

@if($page === 'company-list')
  <script src="{{ asset('customjs/company-list.js') }}"></script>
@else
<script src="{{ asset('customjs/employ-list.js') }}"></script>
@endif


@stack('scripts')


</body>
</html>
