@extends('layouts.app')
@section('header')
@endsection
@section('content')
 <div class="container">
    <div class="col-lg-12"> 
      <div class="row">        
        <div class="formorder"> 
        <h5 class="section-subheading text-muted">Your Data Profile</h5>          
         @foreach($customer as $value)
          <label>Name</label>
            <div class="form-group has-feedback">
               <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$value->name}}">
            </div>
              <label>Username</label>
            <div class="form-group has-feedback">
              <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$value->username}}">
            </div>
             <label>Email</label>
            <div class="form-group has-feedback">
              <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$value->email}}">
            </div>
              <label>No Handphone</label>
            <div class="form-group has-feedback">
             <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$value->nohp}}">
            </div>
            <div class="form-group">
            <br>            
             <center><button class="btn btn-md" style="background:#CCB20A" data-toggle="modal" data-target="#modal-ubah{{$value->id}}"></span>Edit Data Profil</button>  
             <button class="btn btn-md" style="background:#CCB20A" data-toggle="modal" data-target="#modal-ubahpass{{$value->id}}"></span>Change Passwod</button>     
             </center>
          </div>
      </div>
      @endforeach
      @foreach($customer as $value)
      <div id="modal-ubah{{$value->id}}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <img src="img/logo9.jpg" alt="">
             <br>
                <form action="{{route('landingpage_profil.update',[$value->id]) }}" method="POST">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                    <div class="modal-body">
                      <input type="hidden" name="id" class="ubah-id">
                        <div class="row">                       
                          <div class="col-md-12">
                            <input class="form-control" id="name" name="name" value="{{$value->name}}">
                           </div>                   
                        </div>
                        <br>
                        <div class="row">  
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="username" name="username" value="{{$value->username}}">
                          </div>                    
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="email" name="email" value="{{$value->email}}">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{$value->nohp}}">
                          </div>                       
                        </div>
                    </div>
                    <br>
                    <center><button type="submit" class="btn btn-success update"> Save Change</button>
                    <button data-dismiss="modal" class="btn btn-danger ">Cancel</button>
                    </center>
                    <br>
                    </form>
                  </div>
                </div>
              </div>
            
      <div id="modal-ubahpass{{$value->id}}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="box-body">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
             <img src="img/logo9.jpg" alt="">
             <br>
                <form action="{{url('changePassword',$value->id) }}" method="POST" >
                  {{csrf_field()}}
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-12">
                         <input type="password" class="form-control" id="lastpassword" name="passLama" placeholder="your last password" required="">
                        </div>                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="password" class="form-control" id="newpassword1" name="passBaru" placeholder="your new password" required="">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                           <input type="password" class="form-control" id="newpassword2" name="confirmPass" placeholder="confirm your new password" required="">
                        </div>
                      </div>
                    </div>
                    <br>
                    <center><button type="submit" class="btn btn-success update"> Save Change</button>
                    <button data-dismiss="modal" class="btn btn-danger ">Cancel</button></center>
                    <br>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach 

      <div class="col-lg-6"> 
        <div class="formorder">    
           <h5 class="section-subheading text-muted">History of Reservation</h5>  
           <br>  
              <table class="table table-striped text-center"> 
                <tr>
                  <th>ID Order</th>
                  <th>Date Using</th>          
                  <th>Detail Order</th>   
                  <th>Pay Status</th>
                </tr>
                 @foreach($orders as $value)     
                <tr>
                  <td>{{$value->id}}</td>  
                  <td>{{$value->date_using}}</td>        
                  <td><button onclick="detailOrder(this)" data-date_using="{{$value->date_using}}" data-time_using="{{$value->time_using}}" data-time_finish="{{$value->time_finish}}" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->package->kuota+$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" class="btn btn-sm btn-primary">See Detail Order</button></td>
                  <td><b>{{$value->payment_status}}</b></td>     
                </tr>   
                @endforeach  
             </table>  
        </div>
      </div>
      <div id="modal-lihat" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo6.jpg" alt="">
             <br>
             <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="date_using" class="col-md-12 control-label">Date Using : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly disabled class="form-control" id="date_using" name="date_using" value="{{$value->date_using}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="time_using" class="col-md-12 control-label">Time Using : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly disabled class="form-control" id="time_using" name="time_using" value="{{$value->time_using}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="time_fiish" class="col-md-12 control-label">Time Finish : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly disabled class="form-control" id="time_finish" name="time_finish" value="{{$value->time_finish}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="theme" class="col-md-12 control-label">Theme (Custom theme or character) : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly disabled class="form-control" id="theme" name="theme" value="{{$value->theme}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="place" class="col-md-12 control-label">Place (include the complete address) : </label>
                  <div class="col-sm-12 detail-place">                  
                  <input type="text" readonly disabled class="form-control" id="place" name="place" value="{{$value->place}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="guest" class="col-md-12 control-label">Total Guests : </label>
                  <div class="col-sm-12 detail-total">                  
                  <input type="text" readonly disabled class="form-control" id="guest" name="total_guests">
                  </div>
                </div>
                <div class="form-group">
                  <label for="greeting" class="col-md-12 control-label">Greeting : </label>
                  <div class="col-sm-12 detail-greet">                  
                  <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$value->greeting}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Note : </label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly disabled class="form-control" id="note" name="note" value="{{$value->note}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Order Status</label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly disabled class="form-control" id="note" name="note" value="{{$value->order_status}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Total Payment</label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly disabled class="form-control" id="note" name="note" value="{{$value->total_payment}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Payment Status </label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly disabled class="form-control" id="note" name="note" value="{{$value->payment_status}}">
                  </div>
                </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">Back</span></button></center>
              </center>
              <br>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection 
@section('js')
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script type='text/javascript'>  
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
  </script>
  <script type="text/javascript">
  function detailOrder(dom) {
    var date_using = $(dom).data('date_using');
    var time_using = $(dom).data('time_using'); 
    var time_finish = $(dom).data('time_finish');  
    var theme = $(dom).data('theme');
    var place = $(dom).data('place');
    var guest = $(dom).data('guest');
    var greeting = $(dom).data('greeting');
    var note = $(dom).data('note');
    $('#date_using').val(date_using)
    $('#time_using').val(time_using) 
    $('#time_finish').val(time_finish)
    $('#theme').val(theme)
    $('#place').val(place)
    $('#guest').val(guest)
    $('#greet').val(greeting)
    $('#note').val(note)
    $('#modal-lihat').modal('show')
  }
  </script>
@endsection
