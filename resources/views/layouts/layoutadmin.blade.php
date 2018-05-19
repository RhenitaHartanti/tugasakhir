<!DOCTYPE html>
<html>
<head>
  @yield('header')
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{('asset/bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">  
  
  <link rel="stylesheet" href="{{('asset/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{('asset/dist/css/skins/_all-skins.min.css')}}">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo" style="background:#CC9900">
      ADMIN PRECIOUS
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:#CC9900">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Sidebar toggle button-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        </li>
            <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          {{ __('Logout ') }}<i class="fa fa-arrow-right"></i>
                                    </a>
 -->
                                    <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><i class="fa fa-user"></i>  Hai , Administrator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
 -->
                <!-- <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p> -->
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                   <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
                </div>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background:#333300">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">          -->
            <!-- <button class="btn btn-md btn-warning" data-toggle="modal" data-target="#modal-ubah">Setting</button> -->
        </div><p>
        <div class="pull-left info">
           <p><!-- <a href="{{url('/admin_profil')}}">Administrator</a> --></p>
        </div>
      </div>
      <p>
      <ul class="sidebar-menu" data-widget="tree">        
        <li class="">
          <a href="{{url('/admin_dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('/admin_listreservation')}}">
            <i class="fa fa-files-o"></i>
            <span>List Reservation</span>
         </a>
        </li>
        <li class="">
          <a href="{{url('/admin_listpackage')}}">
            <i class="fa fa-cubes"></i>
            <span>Packages Settings</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('/admin_categoryasset')}}">
            <i class="fa fa-database"></i>
            <span>Category Assets</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('/admin_asset')}}">
            <i class="fa fa-archive"></i>
            <span>List Assets</span>
          </a>
        </li>
        
        <li class="">
          <a href="{{url('/admin_listcustomer')}}">
            <i class="fa fa-users"></i>
            <span>List Customers</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('/admin_profil')}}">
            <i class="fa fa-navicon"></i>
            <span>Setting & History</span>
          </a>
        </li>
       <!--  <li class="">
          <a href="{{url('/admin_profil')}}">
            <i class="fa fa-user"></i>
            <span>Administrator</span>
          </a>
        </li> -->
      </ul>
    </section>
  </aside>
<body>
    <div id="app">   
    @include('Flash.flash-message')   
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
     </div>
    <footer class="main-footer">
    <center>
    <strong>Copyright &copy; 2018 Precious Party Planner .</strong> All rights
    reserved.</center>
    <div class="control-sidebar-bg"></div>
    </footer>
<script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{('asset/bower_components/select2/dist/js/select2.min.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{('asset/dist/js/adminlte.min.js')}}"></script>
<script src="{{('asset/dist/js/demo.js')}}"></script>
<script src="{{('vendor/sweetalert/sweetalert.min.js')}}"></script>
@yield('js')
<script type="text/javascript">
    $('.js-aset').select2();
</script>
<script type="text/javascript">
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true  
    })
  })
</script>
<script>
  $('#modal-ubah').on('show.bs.modal',function(e){
    $(this).find('form').attr('action',$(e.relatedTarget).data('route'));
    $(this).find('.ubah-name').val($(e.relatedTarget).data('name'));
    $(this).find('.ubah-username').val($(e.relatedTarget).data('username'));
    $(this).find('.ubah-email').val($(e.relatedTarget).data('email'));
    $(this).find('.ubah-password').val($(e.relatedTarget).data('password'));
  });
</script>
<script type="text/javascript">

  var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
   }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
     return this.href == url;
   }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
 </script>
</body>
</html>
