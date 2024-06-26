<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.head')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
  <!-- /.navbar -->
  @include('layout.navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img  class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
        @include('layout.sidebar')
      
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
  @include('layout.footer')
  <!-- Main Footer -->

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
@if($page === 'company')
<script src="{{ asset('customjs/company.js') }}"></script>
@elseif($page === 'company-list')
  <script src="{{ asset('customjs/company-list.js') }}"></script>
@elseif($page === 'employ')
<script src="{{ asset('customjs/employ.js') }}"></script>
@elseif($page === 'employ-list')
<script src="{{ asset('customjs/employ-list.js') }}"></script>
@endif
</body>
</html>
