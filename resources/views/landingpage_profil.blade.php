@extends('layouts.app')
@section('header')
  <link rel="stylesheet" href="{{asset('asset/css/ionicons.min.css')}}">  
  <link rel="stylesheet" href="{{asset('asset/css/AdminLTE.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('asset/css/skins/_all-skins.min.css')}}">
@endsection
@section('content')
   <section class="order">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Profil</h2>
            <h3 class="section-subheading text-muted"><!-- You can  see our documentation event and package in this gallery --></h3>
        </div><p>
    <div class="row">
      <div class="col-lg-4">
      <table class="table table-striped"> 
         @foreach($customer as $value)
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
        @endforeach       
      </table>
             <div class="row">                
                   <button class="btn btn-md" data-toggle="modal" data-target="#modal-ubah{{$value->id}}"></span>Edit Data Profil</button>
            </div>
      </div>
    </div>   
</section>
    
   <div id="modal-ubah{{$value->id}}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <form class="form-horizontal">
              <div class="box-body">
                       <form action="{{route('customer.update',[$value->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                        <div class="row">
                        <div class="form-group">
                            <label for="name" class="col-md-12 control-label">Name</label>
                            <div class="col-md-12">
                              <input class="form-control" id="name" name="name" value="{{$value->name}}" cl>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="username" class="col-md-12 control-label">Username</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" id="username" name="username" value="{{$value->username}}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="email" class="col-md-12 control-label">Email</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" id="email" name="email" value="{{$value->email}}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="nohp" class="col-md-12 control-label">No Hp</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" id="nohp" name="nohp" value="{{$value->nohp}}">
                            </div>
                        </div>
                        </div>
                        <br>
                      </div>
                   <br>
                      <center><button type="submit" class="btn btn-success"> Save</button></center>
                    </form>
                    </div>
                  </div>
                </div>

@endsection
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
  </body>

</html>
