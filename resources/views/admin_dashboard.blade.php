@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
   <p>
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>150</h3>

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
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Sales Service</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

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
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>65</h3>

              <p>Total Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
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
                  <!-- <th><center>Date Order</center></th> -->
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
                  <!-- <td><center>{{$data->date_order}}</center></td> -->
                  <td><center>{{$data->date_using}}</center></td>
                  <td><center>{{$data->time_using}}</center></td>
                  <td><center> <center><button onclick="detailOrder(this)" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-lihat">See Detail Order</button></center></td>
                  <td>
                  <form method="POST" action="admin_dashboard/{{$data->id}}">
                    {{csrf_field()}}
                      <input type="hidden" name="order_status" value="accept">
                      <center><button type="submit" class="btn btn-sm btn-success">Accept Order</button></center>
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
        <div class="col-md-12"><br>
          <div class="box box-solid"><br>
             <h4 class="box-title"><br><center>Calender Events</center></h4>
              <div class="box-body"> <center>
               <iframe src="https://calendar.google.com/calendar/embed?src=rereradinka%40gmail.com&ctz=Asia%2FJakarta" style="border: 0" width="1050" height="600" frameborder="0" scrolling="no"></iframe> </center>        
           </div> 
            <div class="box-header with-border">        
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
                  <label for="guest" class="col-sm-5 control-label">Total Guests</label>
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
