@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <section class="content">    
      <div class="row">
        @foreach($admin as $key=>$data)  
        <div class="col-xs-10">
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
                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-ubahpassword{{$data->id}}"> <span class="glyphicon glyphicon-lock"></span> Reset Password</button>                   
                </div>
              </div>
            </div>
          @endforeach
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
                      <button type="submit" class="btn btn-success update"> Save</button>
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
                     
                      <button type="submit" class="btn btn-success ubahPass"> Save Password</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
    </section>
     <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header"> 
              <center>
                <h3 class="box-title">History Reservation</h3>
              </center>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  <th><center>Id Order</center></th>
                  <th><center>Username</center></th>
                  <th><center>Name Package</center></th>
                  <th><center>Date Using</center></th>
                  <th><center>Time Using</center></th>
                  <th><center>Detail Order</center></th>
                  <th><center>Payment Status</center></th>
                  <th><center>Detail Payment</center></th>
                  </tr>
                </thead>                
              <tbody>
              @foreach($orders as $value)
                <tr>                                
                  <td><center>{{$value->id}}</center></td>
                  <td><center>{{$value->user->username}}</center></td>
                  <td><center>{{$value->package->name_package}}</center></td>
                  <td><center>{{$value->date_using}}</center></td>
                  <td><center>{{$value->time_using}}</center></td>
                  <td><center> <center><button onclick="detailOrder(this)" data-date_using="{{$value->date_using}}" data-time_using="{{$value->time_using}}" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatdata">See Detail Order</button></center></td>
                  <td>
                    <center><a href="{{URL::to('admin_konfirmasipembayaran/'.$value->id)}}">
                      @if($value->payment == null)
                      <button disabled="disabled" class="btn btn-sm btn-warning">Detail Payment</button>
                      @else
                      <button class="btn btn-sm btn-warning">Detail Payment</button>
                      @endif
                    </a></center></td>
                  <td><center>{{$value->payment_status}}</center></td>
                </tr>                 
              @endforeach
              </tbody>
            </table>

      <div id="modal-lihatdata" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo12.jpg" alt="">
            <div class="modal-header">                      
              <center><h4 class="modal-title" id="myModalLabel">Detail Reservation</h4></center>
            </div>                        
             <form class="form-horizontal">               
               <div class="box-body">     
               <div class="form-group">
                  <label for="date_using" class="col-sm-5 control-label">Date Using</label>
                  <div class="col-sm-6 detail-date_using">
                  </div>
                </div>        
                <div class="form-group">
                  <label for="time_using" class="col-sm-5 control-label">Time Using</label>
                  <div class="col-sm-6 detail-time_using">
                  </div>
                </div>         
                <div class="form-group">
                  <label for="theme" class="col-sm-5 control-label">Theme (Custom theme or character)</label>
                  <div class="col-sm-6 detail-theme">
                  </div>
                </div>
                <div class="form-group">
                  <label for="place" class="col-sm-5 control-label">Place (include the address)</label>
                  <div class="col-sm-6 detail-place">
                  </div>
                </div>
                <div class="form-group">
                  <label for="guest" class="col-sm-5 control-label">Additional Guests</label>
                  <div class="col-sm-6 detail-total">
                  </div>
                </div>
                <div class="form-group">
                  <label for="greeting" class="col-sm-5 control-label">Greeting</label>
                  <div class="col-sm-6 detail-greet">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-sm-5 control-label">Note</label>
                  <div class="col-sm-6 detail-note">
                  </div>
                </div>             
              </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">Back</span></button></center>
              </center>              
              </div>   
            </form>
          </div>           
        </div>
      </div>
   </section>   
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