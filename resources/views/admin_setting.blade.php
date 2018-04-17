@extends('layouts.layoutadmin')
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{url('/asset/bower_components/font-awesome/css/font-awesome.min.css')}}"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('/asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('/asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/asset/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('/asset/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->

@section('content')
<div class="content-wrapper">
<section class="content-header">
         
    <section class="content">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Settings</li>
      </ol>
   <p>
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>History</center></h4>
              <!-- <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-tambah"> <span class="glyphicon glyphicon-plus"></span> </i>Add Data Package</button> -->
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-hover">
                <tr>
                  
                  <td>Id Admin</td>
                  <td>Name</td>
                  <td>Username</td>
                  <td>Email</td>
                  <td>Password</td>
                  <td>Created At</t>
                  <td>Updated At</t>
                  <td>Action</t>
                </tr>
              <tbody>                  
                <tr>                                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

                  <td>
                  <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-ubah{{$value->id}}"> <span class="glyphicon glyphicon-pencil"></span> </i>Edit</button>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus"> <span class="glyphicon glyphicon-trash"></span> </i>Delete</button>
                                  
                  </td>
                </tr>
                </tfoot>
              </table>
            </div>
      <!-- /.row -->
    </section>
</div>
 </section>
@endsection
<script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{('asset/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{('asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{('asset/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>

  // $('#modal-ubah').on('show.bs.modal',function(e){
  //   $(this).find('form').attr('action',$(e.relatedTarget).data('route'));
  //   $(this).find('.ubah-id_package').val($(e.relatedTarget).data('id_package'));
  //   $(this).find('.ubah-category').val($(e.relatedTarget).data('category'));
  //   $(this).find('.ubah-name').val($(e.relatedTarget).data('name'));
  //   $(this).find('.ubah-details').val($(e.relatedTarget).data('details'));
  //   $(this).find('.ubah-price').val($(e.relatedTarget).data('price'));
  // })

  // $('#modal-hapus').on('show.bs.modal',function(e){
  //   $(this).find('form').attr('action',$(e.relatedTarget).data('route'));
  //   $(this).find('.del-name').text($(e.relatedTarget).data('name'));
 
  // })
</script>
