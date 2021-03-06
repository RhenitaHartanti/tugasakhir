@extends('layouts.layoutadmin')
@section('header')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#CCB20A">
            <div class="inner">
              <h3>{{count($orders)}}</h3>
              <p>Request Order</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#CCB20A">
            <div class="inner">
              <h3>{{$total_user}}</h3>
              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#CCB20A">
            <div class="inner">
              <h3>{{$total_package}}</h3>
              <p>Total Package</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-gift "></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#CCB20A">
            <div class="inner">
              <h3></sup></h3>
              <p>Income</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-money "></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>  
  <section class="content">              
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <center><h3>LIST ORDERS</h3></center>
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
                  <th><center>Action</center></th>
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
                  <td><center>{{date('d - F - Y', strtotime ($data->date_using))}}</center></td> 
                  <td><center>{{date('H : i', strtotime ($data->date_using))}}</center></td> 
                  <td><center>
                    @if($data->package->type == "default")       
                    <button onclick="detailOrder(this)" data-username="{{$data->user->name}}" data-name_package="{{$data->package->name_package}}" data-price="Rp. {{number_format($data->price,2,',','.')}}" data-kuota="{{$data->package->kuota}}" data-date_using="{{$data->date_using}}" data-date_finish="{{$data->date_finish}}" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" data-total_payment="Rp. {{number_format($data->total_payment,2,',','.')}}" data-list="{{$data->package->assets->implode('name_asset',', ')}}" class="btn btn-sm btn-primary">Detail Order</button>
                    @else
                    <button onclick="detailOrder(this)" data-username="{{$data->user->name}}" data-name_package="{{$data->package->name_package}}" data-date_using="{{$data->date_using}}" data-price="Rp. {{number_format($data->price,2,',','.')}}" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" data-total_payment="Rp. {{number_format($data->total_payment,2,',','.')}}" data-list="{{$data->package->assets->implode('name_asset',', ')}}" class="btn btn-sm btn-primary">Detail Order</button>
                    <br><br>
                    <button onclick="set(this)" data-id="{{$data->id}}" data-price="{{$data->total_payment}}" class="btn btn-sm btn-warning">Set Price</button>
                    @endif
                  </center></td>
                  <td>
                  <form method="POST" action="admin_dashboard/{{$data->id}}">
                    {{csrf_field()}}
                      <center><button type="submit" class="btn btn-sm btn-success confirm" name="order_status" value="accept">Accept</button>
                      <input type="hidden" name="_method" value="PUT">
                      <button type="submit" class="btn btn-sm btn-danger reject" name="order_status" value="reject">Reject</button></center>
                      <input type="hidden" name="_method" value="PUT">
                  </form>                   
                 </td>                  
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">              
       <div class="row">
        <div class="col-xs-12">
          <div class="box">           
            <br>
              <div class="row">
      <center><div class="col-lg-12 text-center">
        <div class="calender">
        <h3 class="section-heading text-uppercase">CALENDAR RESERVATION</h3>
        <br>
           {!! $calendar->calendar() !!}
      </div>
    </div></center>
  </div>
          </div>
        </div>
      </div>
    </section>    
    <div id="modal-set" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
       <form action="{{route('orders.update') }}" method="post" data-toggle="validator" role="form">    
        {{csrf_field()}}
        {{method_field('PUT')}}           
        <div class="modal-content">
         <img src="img/logo12.jpg" alt="">
         <div class="modal-header">                      
          <center><h4 class="modal-title" id="myModalLabel">Set Price for Custom Package</h4></center>
        </div>                        
        <div class="box-body">
         <input type="hidden" name="id_order" class="detail-id">
         <input type="hidden" value="waiting" name="order_status">
         <div class="form-group">
          <label for="price" class="col-sm-4 control-label">Total Price</label>
          <!-- <input type="text" class="col-sm-6 detail-price" name="price" value=""> -->
          <input type="text" class="col-sm-6 detail-price" name="price" value="" data-error="price column is required" required><br><div class="help-block with-errors"></div>
        </div>
      </div>              
    </div>
    <div class="box-footer">
      <center>
        <button type="submit" class="btn btn-sm btn-success">OK</button>
      </center>              
    </div>   
  </form>          
</div>
</div>
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
                  <label for="price" class="col-sm-5 control-label">Price</label>
                  <div class="col-sm-6 detail-price">
                  </div>
                </div>   
               <div class="form-group">
                  <label for="date_using" class="col-sm-5 control-label">Start Date</label>
                  <div class="col-sm-6 detail-date_using">
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
</section>
</div>
</section>
@endsection
@section('js')
<script type="text/javascript">
  function detailOrder(dom) {
    var username = $(dom).attr('data-username');
    var name_package = $(dom).attr('data-name_package');
    var price = $(dom).attr('data-price');    
    var date_using = $(dom).attr('data-date_using');    
    var theme = $(dom).attr('data-theme');
    var place = $(dom).attr('data-place');
    var guest = $(dom).attr('data-guest');
    var greeting = $(dom).attr('data-greeting');
    var note = $(dom).attr('data-note');
    var total_payment = $(dom).attr('data-total_payment');
    var assets = $(dom).attr('data-list');
    $('.detail-username').html(username)
    $('.detail-name_package').html(name_package)
    $('.detail-price').html(price)    
    $('.detail-date_using').html(date_using)
    $('.detail-assets').html(assets)
    $('.detail-theme').html(theme)
    $('.detail-place').html(place)
    $('.detail-total').html(guest)
    $('.detail-greet').html(greeting)
    $('.detail-note').html(note)
    $('.detail-total_payment').html(total_payment)
    $('#modal-lihat').modal('show')
  }
   function set(dom) {
    var price = $(dom).attr('data-price');
    var id = $(dom).attr('data-id');
    $('.detail-id').val(id)
    $('.detail-price').val(price)
    $('#modal-set').modal('show')
  }

  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection