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
         
    <section class="content">
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Settings</li>
      </ol> -->
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
                  <td>Id Message</td>
                  <td>Name</td>
                  <td>Email or No.HP</td>
                  <td>Message</td>
                  <!-- <td>Action</td> -->
                </tr>
               @foreach($messages as $key=>$data)                
                <tr>                                  
                  <td>{{$data->id_message}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->message}}</td>
                  <!-- <td><a href="#">Jawab</a></td> -->
               </tr>
               @endforeach
              </table>
            </div>
      <!-- /.row -->
    </section>
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