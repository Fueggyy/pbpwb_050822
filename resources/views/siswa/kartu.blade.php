<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  @include('layouts.AdminLTE.script')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" href="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" href="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('AdminLTE/dist')}}/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    @include('layouts.AdminLTE.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{asset('AdminLTE/dist')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @include('layouts.AdminLTE.user')

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        @include('layouts.AdminLTE.sidebar')
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kartu Pelajar</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 w-100">
                <div class="card">
                <div class="card-header ">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('AdminLTE/dist')}}/img/disdik.png" alt="" style="width:150px; height:120px">
                    </div>
                    <div class="col-8 text-center"><br><br>
                        <h1>Kartu Pelajar<br>SMKN 11 Bandung</h1>
                    </div>
                    <div class="col-2">
                        <img src="{{asset('AdminLTE/dist')}}/img/logo.jpg" alt="" style="width:100px; height:130px;">
                    </div>
                </div>
            </div>
                    <div class="row g-0 mt-2">
                        <div class="col-md-4">
                            <img src="{{asset('AdminLTE/dist')}}/img/sparrow.jpg" class="img-fluid rounded-circle px-4" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            @foreach ($siswa as $i)
                                <h5 class="card-title"><b>{{ $i->nama }}</b></h5>
                                <p class="card-text">NIS : {{ $i->nis }}</p>
                                <p class="card-text">NISN : {{ $i->nisn }}</p>
                                <p class="card-text">TTL : {{ $i->tgllahir }}</p>
                                <p class="card-text">JK : {{ $i->kelamin }}</p>
                                <p class="card-text">AGAMA : {{ $i->agama }}</p>
                                <p class="card-text">Alamat : {{ $i->alamatsiswa }}</p>
                            @endforeach
                            </div>
                            <div class="row mt-5">
                                <div class="col" style="margin-left:200px;">
                                    <p class="text-center">Bandung, 28 April 2005</p>
                                    <p class="text-center">Kepala Sekolah</p>
                                    <br><br>
                                    <p class="text-center">Ino Soprano mPd</p>
                                    <p class="text-center">NIP: 76675665456</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $siswa->links() }}   
                </div>
            </div>
          </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer mt-5">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('AdminLTE/plugins')}}/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('AdminLTE/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('AdminLTE/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="{{asset('AdminLTE/plugins')}}/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="{{asset('AdminLTE/plugins')}}/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="{{asset('AdminLTE/plugins')}}/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{asset('AdminLTE/plugins')}}/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('AdminLTE/plugins')}}/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{{asset('AdminLTE/plugins')}}/moment/moment.min.js"></script>
  <script src="{{asset('AdminLTE/plugins')}}/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('AdminLTE/plugins')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{{asset('AdminLTE/plugins')}}/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('AdminLTE/plugins')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('AdminLTE/dist')}}/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('AdminLTE/dist')}}/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('AdminLTE/dist')}}/js/pages/dashboard.js"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>