@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> 
              <center>
                <h3 class="box-title">List Reservation</h3>
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
                  <td><center> <center><button onclick="detailOrder(this)" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihat">See Detail Order</button></center></td>
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
@endsection
@section('js')
<script type="text/javascript">
  function detailOrder(dom) {
    var theme = $(dom).attr('data-theme');
    var place = $(dom).attr('data-place');
    var guest = $(dom).attr('data-guest');
    var greeting = $(dom).attr('data-greeting');
    var note = $(dom).attr('data-note');
    $('.detail-theme').html(theme)
    $('.detail-place').html(place)
    $('.detail-total').html(guest)
    $('.detail-greet').html(greeting)
    $('.detail-note').html(note)
  }
</script>
@endsection