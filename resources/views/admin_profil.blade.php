@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
  <p>      
    <section class="content">
    	<div class="row">
        @foreach($admin as $key=>$data)  
        <div class="col-xs-7">
          <div class="box">
            <div class="box-header">
              <h4><center>Data Profil</center></h4> 
              <div class="row">                 
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">ID Admin</label>
                      <div class="col-sm-8">
                          {{$data->id}}
                       </div>
                </div>
              </div>
                <p>
              <div class="row">                 
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-8">
                          {{$data->name}}
                       </div>
                </div>
              </div>
                <p>
              <div class="row">
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                      <div class="col-sm-8">
                           {{$data->username}}
                      </div>
                </div>
              </div>
              <p>
              <div class="row">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-8">
                          {{$data->email}}
                      </div>
                </div>
              </div>
              <p>
                <div class="row">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">No Hp</label>
                      <div class="col-sm-8">
                           {{$data->nohp}}
                      </div>
                </div>
              </div>
              <p>
              <div class="row">
                <div class="modal-footer">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ubah{{$data->id}}"> <span class="glyphicon glyphicon-pencil"></span> Edit Data</button>
                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-ubahpassword{{$data->id}}"> <span class="glyphicon glyphicon-lock"></span> Change Password</button>
                   
                </div>
              </div>
            </div>
          @endforeach
      <!-- /.row -->
    </section>
</div>
 </section>

 <div id="modal-ubah{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit Data Admin</h4></center>
                      </div>
                       <form action="{{route('admin.update', [$data->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                         <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
                            </div>
                        </div>
                        </div>
                        <br>
                         <div class="row">
                        <div class="form-group">
                            <label for="nohp" class="col-sm-3 control-label">No Hp</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nohp" name="nohp" value="{{$data->nohp}}">
                            </div>
                        </div>
                        </div>
                      </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"> Save</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>

        <div id="modal-ubahpassword{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Change Password</h4></center>
                      </div>
                       <form action="{{route('changePassword',$data->id) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                       <div class="row">
                        <div class="form-group">
                            <label for="lastpassword" class="col-sm-4 control-label">Last Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" id="lastpassword" name="passLama" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="newpassword1" class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" id="newpassword1" name="passBaru" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="newpassword2" class="col-sm-4 control-label">Confirm New Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" id="newpassword2" name="confirmPass" required="">
                            </div>
                        </div>
                        </div>
                      </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-success"> Save Password</button>
                    </div>
                    </form>
                    </div>
                  </div>
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
@section('js')
@endsection