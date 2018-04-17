@extends('layouts.layoutadmin')
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{('asset/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{('asset/dist/css/skins/_all-skins.min.css')}}">
@section('content')
<div class="content-wrapper">
<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Reservation Order</li>
      </ol>
   <p>
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>150</h3>

              <p>Reservation Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Sales Service</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>65</h3>

              <p>Total Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Calender Events</h4>
            </div>
            <div class="box-body">
              <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
         
    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>List Reservation</center></h4>
                         <!-- /.box-header -->
            
            <div class="box-body">
              <table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                  
                  <td>Id Reservation</td>
                  <td>Username</th>
                  <td>Package</td>
                  <td>Order Date</td>
                  <td>Using Date</td>
                  <td>Using Time</td>
                  <td>Detail Order</td>
                  <td><center>Action</center></td>
                </tr>
                </thead>
                <tbody>
               
                <tr>
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td> <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-lihat">See Detail</button></td>
                  <td><center><button type="button" class="btn btn-sm btn-success" ><!-- <a href="<?php echo e(URL('edit_package')); ?>"> -->Accept<!-- </a> --></button> <button type="button" class="btn btn-sm btn-danger"><!-- <a href="<?php echo e(URL('list_package')); ?>"> -->Reject</a></button></center></td>
                </tr>
             
                </tfoot>
              </table>
            </div>

      <!-- /.row -->
    </section>
</div>
 </section>
 <div id="modal-lihat" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo12.jpg" alt="">
            <div class="modal-header">
             
              <center><h4 class="modal-title" id="myModalLabel">Detail Reservation</h4></center>
            </div>
             <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Nama yang Bersangkutan</label>

                  <div class="col-sm-8">
                    <input type="name" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="theme" class="col-sm-4 control-label">Theme (Custom theme or character)</label>

                  <div class="col-sm-8">
                    <input type="theme" class="form-control" id="theme" name="theme">
                  </div>
                </div>
                <div class="form-group">
                  <label for="place" class="col-sm-4 control-label">Place (Sertakan alamatnya)</label>

                  <div class="col-sm-8">
                    <input type="place" class="form-control" id="place" name="place">
                  </div>
                </div>
                <div class="form-group">
                  <label for="guest" class="col-sm-4 control-label">Total Guest</label>

                  <div class="col-sm-8">
                    <input type="guest" class="form-control" id="guest" name="guest">
                  </div>
                </div>
                <div class="form-group">
                  <label for="greeting" class="col-sm-4 control-label">Greeting</label>

                  <div class="col-sm-8">
                    <input type="greeting" class="form-control" id="greeting" name="greeting">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-sm-4 control-label">Note</label>

                  <div class="col-sm-8">
                    <input type="note" class="form-control" id="note" name="note">
                  </div>
                </div>
                <div class="form-group">
                  <label for="request" class="col-sm-4 control-label">Request</label>

                  <div class="col-sm-8">
                    <input type="request" class="form-control" id="request" name="request">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">OK</span></button></center>
              </center>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
    </section>
<script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{('asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{('asset/dist/js/demo.js')}}"></script>
@endsection