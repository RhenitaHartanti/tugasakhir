@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <section class="content">    
      <div class="row">
       
        <div class="col-md-5">
        	<div class="box box-primary">
        		<h4><center>DATA PROFIL</center></h4> 
            <div class="box-body box-profile">            	
             <h3 class="profile-username text-center"> {{$data->name}}</h3>

              <p class="text-muted text-center">level as {{$data->level}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Userame</b> <a class="pull-right"><b>{{$data->username}}</b></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><b>{{$data->email}}</b></a>
                </li>
                <li class="list-group-item">
                  <b>No. Hp</b> <a class="pull-right"><b>{{$data->nohp}}</b></a>
                </li>
              </ul>

            <!--   <a href="#" class="btn btn-primary"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
      </div>
          
       <!-- TAB PANE -->
      <div class="col-md-7">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#ubahData" data-toggle="tab">Change Data Profil</a></li>
            <li><a href="#ubahPassword" data-toggle="tab">Change Password</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="ubahData">
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
                      <button type="submit" class="btn btn-success update"> Save</button>
                    </div>
                    </form>
          </div>    

          <div class="tab-pane" id="ubahPassword">
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
                      <button type="submit" class="btn btn-success ubahPass"> Save Password</button>
                    </div>
                    </form>
          		</div>
              </div>
             </div>
   		 </div>
      </div>
    </section>
   </section>
 </div>
@endsection
@section('js')
<script type="text/javascript">
$('.update').on("click",function(update){
    swal({
  title: "Success !",
  text: "You Upate Your Profil",
  icon: "success",
  buttons: false,
  dangerMode: true,
})
  });
$('.ubahPass').on("click",function(changePassword){
    swal({
  title: "Success !",
  text: "You Change Password",
  icon: "success",
  buttons: false,
  dangerMode: true,
})
  });
</script>
@endsection