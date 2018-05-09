<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
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
    <a href="index2.html" class="logo" style="background:#2e343a">
      ADMIN PRECIOUS
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:#2e343a ">
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
         <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">         
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
          <a href="{{url('/admin_history')}}">
            <i class="fa fa-navicon"></i>
            <span>History Orders</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('/admin_profil')}}">
            <i class="fa fa-user"></i>
            <span>Administrator</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
<body>
    <div id="app">      
        <main class="py-4">
            <div class="content-wrapper">
  <section class="content-header">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
              <br>
              <div class="box-body">
                <div class="col-md-12">
                  <input type="hidden" value="-" name="id_payment">           
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <label for="booking_code" class="col-sm-4 control-label">Booking Code</label>
                      <div class="col-sm-6 detail-booking_code">
                        <div class="col-sm-8">
                          <b>{{$payments->booking_code}}</b>
                        </div>
                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <label for="attach" class="col-sm-4 control-label">Foto</label>
                      <div class="col-sm-6 detail-attachment">
                        <div class="col-sm-8">
                          <img src="{{url('/img/buktitransfer/'.$payments->attachment)}}" style="width: 350px; height:350px;">
                          </div>
                      </div>
                  </div>
                </div>
                <br>
                <form enctype="multipart/form-data" method="POST" action="{{URL::to('accBookingCode/'.$payments->id)}}" role="form">
                  {{csrf_field()}}
                    <div class="box-footer">
                      <input type="hidden" value="{{$payments->booking_code}}" name="booking_code"> 
                        <center>
                          <center>
                            <a href="{{URL::to('admin_listreservation')}}" class="btn-sm btn-success">Reject Payment</a>
                            <button class="btn-sm btn-success">Confirm Payment</button>
                          </center>
                       </center>
                    </div>
                </form>
              </div>
           </div>
        </div> 
  </section>
</section>
</div>
        </main>
     </div>
    <footer class="main-footer">
    <center>
    <strong>Copyright &copy; 2018 Precious Party Planner .</strong> All rights
    reserved.</center>
    <div class="control-sidebar-bg"></div>
    </footer>
@yield('js')
<script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{('asset/dist/js/adminlte.min.js')}}"></script>
<script src="{{('asset/dist/js/demo.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
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
</body>
</html>