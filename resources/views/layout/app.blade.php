<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('template/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

  <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">


  <!-- jQuery -->
<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('template/')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('template/')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('template/')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('template/')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('template/')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('template/')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('template/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('template/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('template/')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template/')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template/')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template/')}}/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="{{asset('template/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('template/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Select2 -->
<script src="{{url('template/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>

<style>
  .session-page{
    align-content: center;
    align-items: center;
    justify-content: center;
    margin-top: 5px;
  }
  .text-session{
    color: darkgrey;
  }

  .badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 90%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="session-page">
          <span class="text-session">{{Session::get('nama')}} ({{Session::get('jabatan')}})</span>
      </div>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
    
         <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-lg mr-1"></i>
          <span class="badge badge-warning navbar-badge ml-2" id="inbox"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="list">
          <a href="#" class="dropdown-item">

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
        </div>

      </li>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$inbox == 0 || $inbox == '0' ? 'Tidak ada pesan' : 'Anda punya '.$inbox.' pesan'}}</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$inbox}} Approval
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
        </div>
      </li>

      <ul class="navbar-nav ml-auto ">
        <div class="topbar-divider d-none d-sm-block"></div>
  
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 "></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
  {{--               
                <a class="dropdown-item" href="#">
                    <span class="d-block"></span>
                </a> --}}
                {{-- <a class="dropdown-item" href="">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    EDIT PROFILE
                </a> --}}
                <a class="dropdown-item" href="{{url ('/logout')}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
  
      </ul>
      
    </ul>
    <!-- Topbar Navbar -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('template/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
      <ul id="lis"></ul>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session::get('username')}}</a>
        </div>
      </div> --}}

      {{-- @include('layout.menu') --}}

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @php
             $currentUrl = explode('/', Route::getCurrentRoute()->uri());
             $countEndPoint = count($currentUrl);
            ($countEndPoint == 2) ? $currentUrl = isset($currentUrl) ? $currentUrl[0].'/'.$currentUrl[1] : '' : $currentUrl = isset($currentUrl) ? '/'.$currentUrl[0] : ''; 
            // dd($currentUrl);
            @endphp
            @if(isset($menuList))
            @foreach ($menuList as $key => $r)
              @if($r->parent == 0 && $r->link == '#')
              <li class="nav-item has-treeview" id="collapse-{{$key}}">
                <a href="#" class="nav-link">
                  <ion-icon class="nav-icon" name="{{$r->icon}}"></ion-icon>
                  <p>
                    {{$r->title}}
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
    
                @if($r->sub_menu2)
                <ul class="nav nav-treeview">
                  @foreach ($r->sub_menu2 as $s)
                  <li class="nav-item ">
                    <a href="{{url($s->link)}}"
                      class="nav-link {{$currentUrl == $s->link ? 'active' : ''}} ml-4">
                      <ion-icon name="{{$s->icon}}"></ion-icon>
                      <p>{{$s->title}}</p>
                    </a>
                  </li>
                  @if($currentUrl == $s->link)
                  <script>
                    $('#collapse-{{$key}}').addClass('menu-open');
                  </script>
                  @endif
                  @endforeach
                </ul>
                @endif
    
              </li>
              @else
              <li class="nav-item">
                <a href="{{url('dashboard')}}" class="nav-link">
                  <ion-icon class="nav-icon" name="analytics-outline"></ion-icon>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              @endif
              @endforeach
            @endif
        </ul>
      </nav>
    

    </div>
    <!-- /.sidebar -->
  </aside>

  @include('layout.judul')

  @yield('content')  
  @if(Session::has('success'))
    <script type="text/javascript">
      	$.alert('Data berhasil disimpan');
    </script>
  @endif
  @if(Session::has('fail'))
  <script type="text/javascript">
    $.alert('Terjadi kesalahan saat menyimpan data, silahkan coba lagi nanti');
</script>
@endif
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>


  function inbox(){
    $.ajax({
      url: "{{url('api/getInbox')}}",
      type: "GET",
      dataType: "JSON",
      success: function(res){
        var inbox = (res > 0) ? res : '';
        $('#inbox').html(inbox);
      }
    })
  }

  $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
      });
  });

  function dataInbox(){
    $.ajax({
      url: "{{url('api/dataInbox')}}",
      type: "GET",
      dataType: "JSON",
      success: function(res){
        $.each(res, function(index, value){
          let id = value.id;
          $('#list').prepend("<a href='http://localhost/administrasi/public/master/surat/view/"+value.id+"' class='dropdown-item'> <div class='media'> <img src='{{url('template/dist/img/user8-128x128.jpg')}}' alt='User Avatar' class='img-size-50 img-circle mr-3'> <div class='media-body'> <h3 class='dropdown-item-title'>"+value.nama_karyawan+" <span class='float-right text-sm text-warning'><i class='fas fa-star'></i></span> </h3> <p class='text-sm'> Approval "+value.nama+"</p> <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i>"+value.tanggal+"</p> </div> </div> </a>");
        })
      }
    })
  }

  $(document).ready(function(){
    var pesan = $('#inbox').text();
    inbox();
    dataInbox();
    setInterval(inbox, 60000);
    setInterval(dataInbox, 60000);

  });

</script>
@yield('script')
</body>
</html>
