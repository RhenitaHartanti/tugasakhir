@extends('layouts.app')
@section('header')
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="login2">        
		    <form enctype="multipart/form-data" method="POST" action="/uploadBukti" role="form">
                {{ csrf_field() }}
              <div class="box-body">                 
               <br>
                <center><h5><b>Payment Invoice</b></h5></center>
                <br>
                <div class="form-group">
                  
                  Hallo,<b> {{$order->user->name}}</b><br>
                  terimakasih sudah melakukan pemesanan paket di Precious Party Planner.
                  Berikut adalah detail tagihan anda: <br>
                  ID Order : {{$order->id}} <br>
                  Package : {{$order->package->name_package}} <br>
                  Order Status : {{$order->order_status}} <br>
                  Total Payment : Rp. {{$order->total_payment}} <br>
                  Payment Status :{{$order->payment_status}}
                  <br>
                  Untuk menindaklanjuti pesanan anda, silahkan lakukan pembayaran melalui transfer ke rekening berikut :
                  <b>BNI #0296-35-1450</b>
                  Atas nama <b>Debora</b>                  
                </div>
                <hr>
                <center><h5><b>Upload Your Payment Invoice Here</b></h5></center>
                <div class="form-group">
                  <br>
                  <label for="id_order" class="col-sm-12 control-label">Booking Code</label>
                  <div class="col-sm-12">
                    <input type="id_order" class="form-control" id="booking_code" name="booking_code">
                  </div>
                </div>
                <div class="form-group">
                  <label for="attach" class="col-sm-12 control-label">Attach File</label>
                  <div class="col-sm-12">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                  </div>
                </div> 
                <input type="hidden" value="{{$id}}" name="id_order">
              </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" type="submit" class="close" data-dismiss="modal"><span aria-hidden="true">Send Confirmation</span></button></center>
              </center>
              </div>
              
            </form>
           
	      </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
@endsection