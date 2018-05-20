@extends('layouts.layoutadmin')
@section('header')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background:#CC9900">
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
          <div class="small-box" style="background:#CC9900">
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
          <div class="small-box" style="background:#CC9900">
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
          <div class="small-box" style="background:#CC9900">
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
             <center><h3 class="box-title">List Orders</h3></center>
            </div>
            <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>                  
                  <th><center>Id Order</center></th>
                  <th><center>Username</center></th>
                  <th><center>Name Package</center></th>
                  <th><center>Using Date</center></th>
                  <th><center>Using Time</center></th>
                  <th><center>Detail Order</center></th>
                  <th><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $key=>$data)
                <tr>                   
                  <td><center>{{$data->id}}</center></td>
                  <td><center>{{$data->user->username}}</center></td>
                  <td><center>{{$data->package->name_package}}</center></td>
                  <td><center>{{$data->date_using}}</center></td>
                  <td><center>{{$data->time_using}}</center></td>
                  <td><center> <center><button onclick="detailOrder(this)" data-date_using="{{$data->date_using}}" data-time_using="{{$data->time_using}}" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" class="btn btn-sm btn-primary">See Detail Order</button></center></td>
                  <td>
                  <form method="POST" action="admin_dashboard/{{$data->id}}">
                    {{csrf_field()}}
                      <center><button type="submit" class="btn btn-sm btn-success confirm" name="order_status" value="accept">Accept Order</button></center>
                      <br>
                      <input type="hidden" name="_method" value="PUT">
                      <center><button type="submit" class="btn btn-sm btn-danger reject" name="order_status" value="reject">Reject Order</button></center>
                      <input type="hidden" name="_method" value="PUT">
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
    var date_using = $(dom).attr('data-date_using');
    var time_using = $(dom).attr('data-time_using');
    var theme = $(dom).attr('data-theme');
    var place = $(dom).attr('data-place');
    var guest = $(dom).attr('data-guest');
    var greeting = $(dom).attr('data-greeting');
    var note = $(dom).attr('data-note');
    $('.detail-date_using').html(date_using)
    $('.detail-time_using').html(time_using)
    $('.detail-theme').html(theme)
    $('.detail-place').html(place)
    $('.detail-total').html(guest)
    $('.detail-greet').html(greeting)
    $('.detail-note').html(note)
    $('#modal-lihat').modal('show')
  }
  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection