@extends('layouts.app')
@section('header')
@endsection
@section('content')
<br>
<br>
 <div class="container">
    <div class="col-lg-12"> 
      <div class="row">        
        <div class="formorder"> 
        <h5 class="section-subheading text-muted">Your Data Profile</h5>          
          <label>Name</label>
            <div class="form-group has-feedback">
               <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$data->name}}">
            </div>
              <label>Username</label>
            <div class="form-group has-feedback">
              <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$data->username}}">
            </div>
             <label>Email</label>
            <div class="form-group has-feedback">
              <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$data->email}}">
            </div>
              <label>No Handphone</label>
            <div class="form-group has-feedback">
             <input type="text" readonly disabled class="form-control" id="greeting" name="greeting" value="{{$data->nohp}}">
            </div>
            <div class="form-group">
            <br>            
             <center><button class="btn btn-md" style="background:#CCB20A" data-toggle="modal" data-target="#modal-ubah{{$data->id}}"></span>Edit Data Profil</button>  
             <button class="btn btn-md" style="background:#CCB20A" data-toggle="modal" data-target="#modal-ubahpass{{$data->id}}"></span>Change Passwod</button>     
             </center>
          </div>
      </div>
      
     
      <div id="modal-ubah{{$data->id}}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <img src="img/logo9.jpg" alt="">
             <br>
                <form action="{{route('landingpage_profil.update',[$data->id]) }}" method="POST">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                    <div class="modal-body">
                      <input type="hidden" name="id" class="ubah-id">
                        <div class="row">                       
                          <div class="col-md-12">
                            <input class="form-control" id="name" name="name" value="{{$data->name}}">
                           </div>                   
                        </div>
                        <br>
                        <div class="row">  
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}">
                          </div>                    
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{$data->nohp}}">
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
            
      <div id="modal-ubahpass{{$data->id}}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="box-body">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
             <img src="img/logo9.jpg" alt="">
             <br>
                <form action="{{url('changePassword',$data->id) }}" method="POST" >
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


      <div class="col-lg-6"> 
        <div class="formorder">    
           <h5 class="section-subheading text-muted"><center>History of Reservation</center></h5>  
           <br>  
              <table class="table table-striped text-center"> 
                <tr>
                  <th>ID Order</th>
                  <th>Date Using</th>          
                  <th>Detail Order</th>   
                </tr>
                 @foreach($orders as $value)   
                 @php
                $pnjg = strlen($value->id);
                if($pnjg==1){
                  $id = 'ORD00'.$value->id;
                }elseif($pnjg==2){
                  $id = 'ORD0'.$value->id;
                }else{
                  $id = 'ORD'.$value->id;
                }
                @endphp    
                <tr>
                  <td>{{$id}}</td>  
                  <td>{{$value->date_using}}</td>        
                  <td><button onclick="detailOrder(this)" data-name_package="{{$value->package->name_package}}" data-date_using="{{$value->date_using}}" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->package->kuota+$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" data-total_payment="{{$value->total_payment}}" data-payment_status="{{$value->payment_status}}" class="btn btn-sm btn-primary">See Detail Order</button></td>    
                </tr>   
                @endforeach  
             </table>  
        </div>
      </div>
      @foreach($orders as $value)
      <div id="modal-lihat" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo6.jpg" alt="">
             <br>
             <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                 <div class="form-group">
                  <label for="name_package" class="col-md-12 control-label">Name Package : </label>
                  <div class="col-sm-12 detail-name_package">            
                    <input type="text" readonly disabled class="form-control" id="name_package" name="name_package" value="{{$value->name_package}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="date_using" class="col-md-12 control-label">Date Using : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly disabled class="form-control" id="date_using" name="date_using" value="{{$value->date_using}}">                  
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
                  <label for="note" class="col-md-12 control-label">Total Payment : </label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly disabled class="form-control" id="note" name="note" value="{{$value->total_payment}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Payment Status : </label>
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
    @endforeach  

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
    var name_package = $(dom).data('name_package');
    var date_using = $(dom).data('date_using');
    var theme = $(dom).data('theme');
    var place = $(dom).data('place');
    var guest = $(dom).data('guest');
    var greeting = $(dom).data('greeting');
    var note = $(dom).data('note');
    var total_payment = $(dom).data('total_payment');
    var payment_status = $(dom).data('payment_status');
    $('#name_package').val(name_package)
    $('#date_using').val(date_using)
    $('#theme').val(theme)
    $('#place').val(place)
    $('#guest').val(guest)
    $('#greet').val(greeting)
    $('#note').val(note)
    $('#total_payment').val(total_payment)
    $('#payment_status').val(payment_status)
    $('#modal-lihat').modal('show')
  }
  $('.update').on("click",function(update){
  swal({
  title: "Success",
  text: "You Update the Package",
  icon: "success",
  buttons: false,
  dangerMode: false,
})
  });
  </script>
@endsection
