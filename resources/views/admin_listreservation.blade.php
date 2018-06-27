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
                  <th><center>Date</center></th>
                  <th><center>Time</center></th>
                  <th><center>Detail Order</center></th>  
                  <th><center>Update</center></th>                 
                  <th><center>Detail Payment</center></th>
                  <th><center>Payment Status</center></th>
                  </tr>
                </thead>                
              <tbody>
             @foreach($orders as $key=>$data)
              @php
                $pnjg = strlen($data->id);
                if($pnjg==1){
                  $id = 'ORD00'.$data->id;
                }elseif($pnjg==2){
                  $id = 'ORD0'.$data->id;
                }else{
                  $id = 'ORD'.$data->id;
                }
                @endphp
                <tr>                                
                  <td><center>{{$id}}</center></td>
                  <td><center>{{$data->user->username}}</center></td>
                  <td><center>{{$data->package->name_package}}</center></td>
                  <td><center>{{date('d-F-Y', strtotime ($data->date_using))}}</center></td> 
                  <td><center>{{date('H:i', strtotime ($data->date_using))}}</center></td> 
                  <td><center> <center><button onclick="detailOrder(this)" data-username="{{$data->user->name}}"  data-name_package="{{$data->package->name_package}}" data-price="Rp. {{number_format($data->price,2,',','.')}}" data-kuota="{{$data->package->kuota}}" data-date_using="{{$data->date_using}}" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" data-total_payment="Rp. {{number_format($data->total_payment,2,',','.')}}" data-list="{{$data->package->assets->implode('name_asset',' , ')}}" class="btn btn-sm btn-primary">Detail Order</button></center></td>
                  <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-ubah{{$data->id}}">Update Order</button></td>
                  <td>
                    <center><a href="{{URL::to('admin_konfirmasipembayaran/'.$data->id)}}">
                      @if($data->payment == null)
                      <button disabled="disabled" class="btn btn-sm btn-warning">Detail Payment</button>
                      @else
                      <button class="btn btn-sm btn-warning">Detail Payment</button>
                      @endif
                    </a></center></td>
                  <td><center>{{$data->payment_status}}</center></td>
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
               <div class="box-body" style="text-align: left"> 
               <div class="form-group">
                  <label for="username" class="col-sm-5 control-label">Customer</label>
                  <div class="col-sm-6 detail-username">
                  </div>
                </div>   
               <div class="form-group">
                  <label for="name_package" class="col-sm-5 control-label">Name Package</label>
                  <div class="col-sm-6 detail-name_package">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="price" class="col-sm-5 control-label">Price</label>
                  <div class="col-sm-6 detail-price">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="kuota" class="col-sm-5 control-label">Kuota</label>
                  <div class="col-sm-6 detail-kuota">
                  </div>
                </div>   
               <div class="form-group">
                  <label for="date_using" class="col-sm-5 control-label">Start Date</label>
                  <div class="col-sm-6 detail-date_using">
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
                <div class="form-group">
                  <label for="note" class="col-sm-5 control-label">Total Payment</label>
                  <div class="col-sm-6 detail-total_payment">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="list" class="col-sm-5 control-label">List Items</label>
                  <div class="col-sm-6 detail-list">
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

      <!-- update order -->
      @foreach($orders as $key=>$data)
      <div id="modal-ubah{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                  <center><h4 class="modal-title" id="myModalLabel">Update Reservation</h4></center>
            </div>
              <form action="{{route('admin_listreservation.update', [$data->id]) }}" method="POST" class="form">
                {{csrf_field()}}
                  {{method_field('PUT')}}
                    <div class="modal-body">
                      <input type="hidden" name="id" class="ubah-id">
                        <br>
                          <div class="row">
                            <div class="form-group">
                             <label for="username" class="col-sm-3 control-label">Customer Name</label>
                             <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" name="username" value="{{$data->user->name}}">
                            </div>
                              </div>
                            </div>
                          <br>
                         <div class="row">
                          <div class="form-group">
                            <label for="name_package" class="col-sm-3 control-label">Name Package</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name_package" name="name_package" value="{{$data->package->name_package}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control price" name="price" value="{{$data->price}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="kuota" class="col-sm-3 control-label">Kuota</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="kuota" name="kuota" value="{{$data->package->kuota}}" readonly>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="date_using" class="col-sm-3 control-label">Date Using</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="date_using" name="date_using" value="{{$data->date_using}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="theme" class="col-sm-3 control-label">Theme</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="theme" name="theme" value="{{$data->theme}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="place" class="col-sm-3 control-label">Place</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="place" name="place" value="{{$data->place}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="total_guests" class="col-sm-3 control-label">Additional Guest</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="total_guests" name="total_guests" value="{{$data->total_guests}}" onchange="total(this,{{$data->id}})">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="greeting" class="col-sm-3 control-label">Greeting</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="greeting" name="greeting" value="{{$data->greeting}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="note" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="note" name="note" value="{{$data->note}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="total_payment" class="col-sm-3 control-label">Total Payment</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control price" id="total_payment{{$data->id}}" name="total_payment" value="{{$data->total_payment}}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                       <center><button type="submit" class="btn btn-success update"> Save</button></center>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                @endforeach

</section>
</section>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function detailOrder(dom) {
    var username = $(dom).attr('data-username');
    var name_package = $(dom).attr('data-name_package');
    var price = $(dom).attr('data-price');    
    var kuota = $(dom).attr('data-kuota');    
    var date_using = $(dom).attr('data-date_using');
    var theme = $(dom).attr('data-theme');
    var place = $(dom).attr('data-place');
    var guest = $(dom).attr('data-guest');
    var greeting = $(dom).attr('data-greeting');
    var note = $(dom).attr('data-note');
    var total_payment = $(dom).attr('data-total_payment');
    var list = $(dom).attr('data-list');
    $('.detail-username').html(username)
    $('.detail-name_package').html(name_package)
    $('.detail-price').html(price)    
    $('.detail-kuota').html(kuota)
    $('.detail-date_using').html(date_using)
    $('.detail-theme').html(theme)
    $('.detail-place').html(place)
    $('.detail-total').html(guest)
    $('.detail-greet').html(greeting)
    $('.detail-note').html(note)
    $('.detail-total_payment').html(total_payment)
    $('.detail-list').html(list)
    $('#modal-lihat').modal('show')
  }
  function total(element,id){
    var oldValue = element.defaultValue;
    var newValue = element.value;
    var total_payment = (newValue - oldValue) * 100000;
    var parse = $('#total_payment' + id).val().replace(/[($)\s\._\-]+/g, '');
    $('#total_payment' + id).val(parseInt(parse) + total_payment)
    var $this = $('#total_payment' + id);
    var input = $this.val();
    input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;
    $('#total_payment' + id).val( function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id" );
    });
   element.defaultValue=newValue;
  }
  $('.price').each(function() {
    var input = $(this).val();
    var input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;
    $(this).val( function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id" );
    });
});
$( ".price" ).on( "keyup", numberFormat);
function numberFormat(event){
    var selection = window.getSelection().toString();
    if ( selection !== '' ) {
        return;
    }
    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
        return;
    }
    var $this = $( this );
    var input = $this.val();
    var input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;
    $this.val( function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id" );
    });
}
$( ".price" ).on( "blur", checkFormat);
function checkFormat(event){
    var data = $( this ).val().replace(/[($)\s\._\-]+/g, '');
    if(!$.isNumeric(data)){
        $( this ).val("");
    }
}
$('.form').submit(function() {
    $('.price').each(function() {
        var number = $( this ).val().replace(/[($)\s\._\-]+/g, '');
        $(this).val(number);
    });
});
  </script>
@endsection