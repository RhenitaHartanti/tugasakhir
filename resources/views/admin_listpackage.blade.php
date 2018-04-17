@extends('layouts.layoutadmin')
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
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
        <li class="active">List Package</li>
      </ol>
   <p>
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>List Package</center></h4>
              <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-tambah"> <span class="glyphicon glyphicon-plus"></span> </i>Add Data Package</button>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-hover">
                <tr>
                  <td>Id Package</td>
                  <td>Name</td>
                  <td>Details</th>
                  <td>Price</th>
                  <td>Settings</td>
                  </tr>                           
                	@foreach($package as $value)
                <tr>                                  
                  <td>{{$value->id_package}}</td>
                  <td>{{$value->package_name}}</td>
                  <td>{{$value->details}}</td>
                  <td>{{$value->price}}</td>
                  <td>
                  <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-ubah{{$value->id_package}}"> <span class="glyphicon glyphicon-pencil"></span> </i>Edit</button>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus{{$value->id_package}}"> <span class="glyphicon glyphicon-trash"></span> </i>Delete</button>                  
                  </td>
                </tr>

                <!-- MODAL EDIT -->

                <div id="modal-ubah{{$value->id_package}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit Data Package</h4></center>
                      </div>
                       <form action="{{ route('package.update', [$value->id_package]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                          <div class="row">
                        <div class="form-group">
                            <label for="id_package" class="col-sm-2 control-label">ID Package</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="id_package" name="id_package" value="{{$value->id_package}}" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="package_name" class="col-sm-2 control-label">Package Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="package_name" name="package_name" value="{{$value->package_name}}" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="details" class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="details" name="details" value="{{$value->details}}" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="price" name="price" value="{{$value->price}}" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                      </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"> Save</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>

                <!-- MODAL DELETE -->
                <div id="modal-hapus{{$value->id_package}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data Package</h4>
                      </div>
                        <div class="modal-body">
                          <p>Are you sure to delete <span class="del-name" style="font-weight: bold;"></span> ?</p>                            
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-success" href="{{route('package.delete',[$value->id_package])}}">Yes</a>
                            <button data-dismiss="modal" class="btn btn-danger">No</button>
                        </div>
                    </div>
                  </div>
                </div>

                </tfoot>
                	@endforeach
              </table>
            </div>

             <!-- modal -->

      <div id="modal-tambah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Add Data Package</h4>
            </div>
             <form class="form-horizontal" action="{{route('admin_listpackage.store')}}" method="post">
   {{csrf_field()}}
              <div class="modal-body">
                <div class="form-group">
                            <label for="id_package" class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="id_package" name="id_package" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="package_name" class="col-sm-2 control-label">Package Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="package_name" name="package_name" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="details" class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="details" name="details" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="price" name="price" required="">
                            </div>
                        </div>
                        </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"> Save</button>
          </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div> 

    </section>
</div>
 </section>

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

  $('#modal-ubah').on('show.bs.modal',function(e){
    $(this).find('form').attr('action',$(e.relatedTarget).data('route'));
    $(this).find('.ubah-id_package').val($(e.relatedTarget).data('id_package'));
    $(this).find('.ubah-category').val($(e.relatedTarget).data('category'));
    $(this).find('.ubah-name').val($(e.relatedTarget).data('name'));
    $(this).find('.ubah-details').val($(e.relatedTarget).data('details'));
    $(this).find('.ubah-price').val($(e.relatedTarget).data('price'));
  })


  $('#modal-hapus').on('show.bs.modal',function(e){
    $(this).find('form').attr('action',$(e.relatedTarget).data('route'));
    $(this).find('.del-name').text($(e.relatedTarget).data('name'));
 
  })
</script>
@endsection