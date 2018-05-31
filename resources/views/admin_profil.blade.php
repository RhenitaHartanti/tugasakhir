@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header"
     <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header"> 
              <center>
                <center><h3>HISTORY RESERVATIONS</h3></center>
              <br>
              </center>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  <th><center>Id Order</center></th>
                  <th><center>Username</center></th>
                  <th><center>Name Package</center></th>
                  <th><center>Start Date</center></th>
                  <th><center>Date Finish</center></th>
                  <th><center>Detail Order</center></th>                  
                  <th><center>Payment Status</center></th>
                  </tr>
                </thead>                
              <tbody>
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
                  <td><center>{{$id}}</center></td>
                  <td><center>{{$value->user->username}}</center></td>
                  <td><center>{{$value->package->name_package}}</center></td>
                  <td><center>{{$value->date_using}}</center></td>
                  <td><center>{{$value->date_finish}}</center></td>
                  <td><center> <center><button onclick="detailOrder(this)" data-username="{{$value->user->name}}" data-name_package="{{$value->package->name_package}}" data-date_using="{{$value->date_using}}" data-date_finish="{{$value->date_finish}}" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" data-total_payment="{{$value->total_payment}}" data-list="{{$value->package->assets->implode('name_asset',', ')}}" class="btn btn-sm btn-primary"  style="background:#A79A67">Detail Order</button></center></td>
                  <td><center>{{$value->payment_status}}</center></td>
                </tr>  
                 @endforeach                 
              </tbody>
          </table>
    
 
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
                  <label for="name_package" class="col-sm-5 control-label">Customer</label>
                  <div class="col-sm-6 detail-username">
                  </div>
                </div>  
               <div class="form-group">
                  <label for="name_package" class="col-sm-5 control-label">Name Package</label>
                  <div class="col-sm-6 detail-name_package">
                  </div>
                </div>      
               <div class="form-group">
                  <label for="date_using" class="col-sm-5 control-label">Start Date</label>
                  <div class="col-sm-6 detail-date_using">
                  </div>
                </div>        
                <div class="form-group">
                  <label for="time_using" class="col-sm-5 control-label">Finish Date</label>
                  <div class="col-sm-6 detail-date_finish">
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
                <div class="form-group">
                  <label for="note" class="col-sm-5 control-label">Total Payment</label>
                  <div class="col-sm-6 detail-total_payment">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="note" class="col-sm-5 control-label">Asset</label>
                  <div class="col-sm-6 detail-assets">
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
    </div>   
</section> 

@endsection
@section('js')
<script type="text/javascript">
  function detailOrder(dom) {
    var username = $(dom).attr('data-username');
    var name_package = $(dom).attr('data-name_package');
    var date_using = $(dom).attr('data-date_using');
    var date_finish = $(dom).attr('data-date_finish');
    var theme = $(dom).attr('data-theme');
    var place = $(dom).attr('data-place');
    var guest = $(dom).attr('data-guest');
    var greeting = $(dom).attr('data-greeting');
    var note = $(dom).attr('data-note');
    var total_payment = $(dom).attr('data-total_payment');
    var assets = $(dom).attr('data-list');
    $('.detail-username').html(username)
    $('.detail-name_package').html(name_package)
    $('.detail-date_using').html(date_using)
    $('.detail-date_finish').html(date_finish)
    $('.detail-assets').html(assets)

    $('.detail-theme').html(theme)
    $('.detail-place').html(place)
    $('.detail-total').html(guest)
    $('.detail-greet').html(greeting)
    $('.detail-note').html(note)
    $('.detail-total_payment').html(total_payment)
    $('#modal-lihat').modal('show')
  }
  
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