@extends('layouts.app')
@section('header')
  <link rel="stylesheet" href="{{asset('asset/css/ionicons.min.css')}}">  
  <link rel="stylesheet" href="{{asset('asset/css/AdminLTE.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('asset/css/skins/_all-skins.min.css')}}">
@endsection
@section('content')
<center>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="login2">
        <img src="img/logo14.jpg" alt="">
        <div class="row">
      <div class="col-lg-12">
         @foreach($customer as $value)
      <table class="table table-striped"> 
        
        <tr>
          <td>Name</td>
          <td>{{$value->name}}</td>
        </tr>
        <tr>
          <td>Username</td>
          <td>{{$value->username}}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{$value->email}}</td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td>{{$value->nohp}}</td>
        </tr> 
         </table>         
        <br>
        <tr>  
        <td>                
       <center><button class="btn btn-md" style="background:#CCB20A" data-toggle="modal" data-target="#modal-ubah{{$value->id}}"></span>Edit Data Profil</button></center>
       </td>  
       </tr>  
    @endforeach       
     

    
    @foreach($customer as $value)
   <div id="modal-ubah{{$value->id}}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
              <div class="box-body">
                       <form action="{{route('landingpage_profil.update',[$value->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                        <div class="row">
                        <div class="form-group">
                            <label for="name" class="col-lg-12 control-label">Name</label>
                            <div class="col-lg-12">
                              <input class="form-control" id="name" name="name" value="{{$value->name}}" cl>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="username" class="col-lg-12 control-label">Username</label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="username" name="username" value="{{$value->username}}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="email" class="col-lg-12 control-label">Email</label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="email" name="email" value="{{$value->email}}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="nohp" class="col-lg-12 control-label">No Hp</label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="nohp" name="nohp" value="{{$value->nohp}}">
                            </div>
                        </div>
                        </div>
                      </div>
                   <br>
                      <center><button type="submit" class="btn btn-success"> Save Change</button></center>
                    </form>
                    </div>
                  </div>
                </div>
    @endforeach       


@endsection
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/agency.min.js"></script>
  </body>

</html>
