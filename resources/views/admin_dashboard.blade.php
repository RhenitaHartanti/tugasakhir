@extends('layouts.layoutadmin')
@section('header')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#E1D69C">
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
          <div class="small-box" style="background:#E1D69C">
            <div class="inner">
              <h3>{{$total_asset}}<sup style="font-size: 20px"></sup></h3>
              <p>Total Asset</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#E1D69C">
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
          <div class="small-box" style="background:#E1D69C">
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
                  <th><center>Start Date</center></th>
                  <th><center>Finish Date</center></th>
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
                  <td><center>{{$data->user->name}}</center></td>
                  <td><center>{{$data->package->name_package}}</center></td>
                  <td><center>{{$data->date_using}}</center></td>
                  <td><center>{{$data->date_finish}}</center></td>
                  <td><center> <center><button onclick="detailOrder(this)" data-username="{{$data->user->name}}" data-name_package="{{$data->package->name_package}}" data-date_using="{{$data->date_using}}" data-date_finish="{{$data->date_finish}}" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" data-total_payment="{{$data->total_payment}}" class="btn btn-sm btn-primary" style="background:#A79A67">Detail Order</button></center></td>
                  <td>
                  <form method="POST" action="admin_dashboard/{{$data->id}}">
                    {{csrf_field()}}
                      @if($data->package->type == "default")                    
                      <button type="submit" class="btn btn-sm btn-success confirm" name="order_status" value="accept">Accept</button>
                      <br>
                      <input type="hidden" name="_method" value="PUT">
                      <button type="submit" class="btn btn-sm btn-danger reject" name="order_status" value="reject">Reject</button>
                      <input type="hidden" name="_method" value="PUT">
                      @else
                      <button type="submit" class="btn btn-sm btn-success confirm" name="order_status" value="accept">Accept</button>
                      <br>
                      <input type="hidden" name="_method" value="PUT">
                      <button type="submit" class="btn btn-sm btn-danger reject" name="order_status" value="reject">Reject</button>
                      <input type="hidden" name="_method" value="PUT">
                      <button onclick="set(this)" data-price="{{$data->package->price}}" class="btn btn-sm btn-warning">Set</button>
                      @endif
                  </form><p>                    
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
          <div class="modal-content">
             <img src="img/logo12.jpg" alt="">
            <div class="modal-header">                      
              <center><h4 class="modal-title" id="myModalLabel">Set Price for Custom Package</h4></center>
            </div>                        
             <form class="form-horizontal">               
               <div class="box-body">
             <input type="hidden" value="waiting" name="order_status">
               <div class="form-group">
                  <label for="name_package" class="col-sm-5 control-label">Total Price</label>
                  <div class="col-sm-6 detail-price">
                  </div>
                </div>              
              </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">OK</span></button></center>
              </center>              
              </div>   
            </form>
          </div>           
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
    var date_using = $(dom).attr('data-date_using');
    var date_finish = $(dom).attr('data-date_finish');
    var theme = $(dom).attr('data-theme');
    var place = $(dom).attr('data-place');
    var guest = $(dom).attr('data-guest');
    var greeting = $(dom).attr('data-greeting');
    var note = $(dom).attr('data-note');
    var total_payment = $(dom).attr('data-total_payment');
    $('.detail-username').html(username)
    $('.detail-name_package').html(name_package)
    $('.detail-date_using').html(date_using)
    $('.detail-date_finish').html(date_finish)
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
    $('.detail-price').html(price)
    $('#modal-set').modal('show')
  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection