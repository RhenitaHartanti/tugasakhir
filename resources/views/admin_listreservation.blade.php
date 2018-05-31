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
                  <th><center>Start Date</center></th>
                  <th><center>Finish Date</center></th>
                  <th><center>Detail Order</center></th>  
                  <th><center>Update Order</center></th>                 
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
                  <td><center>{{$data->date_using}}</center></td>
                  <td><center>{{$data->date_finish}}</center></td>
                  <td><center> <center><button onclick="detailOrder(this)" data-username="{{$data->user->name}}"  data-name_package="{{$data->package->name_package}}" data-date_using="{{$data->date_using}}" data-date_finish="{{$data->date_finish}}" data-theme="{{$data->theme}}" data-place="{{$data->place}}" data-guest="{{$data->total_guests}}" data-greeting="{{$data->greeting}}" data-note="{{$data->note}}" data-total_payment="{{$data->total_payment}}" data-list="{{$data->package->assets->implode('name_asset',' , ')}}" class="btn btn-sm btn-primary" style="background:#A79A67">Detail Order</button></center></td>
                  <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ubah{{$data->id}}">Update Order</button></td>
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

      <div id="modal-ubah{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                  <center><h4 class="modal-title" id="myModalLabel">Edit Data Package</h4></center>
            </div>
              <form action="{{route('admin_listreservation.update', [$data->id]) }}" method="POST">
                {{csrf_field()}}
                  {{method_field('PUT')}}
                    <div class="modal-body">
                      <input type="hidden" name="id" class="ubah-id">
                        <br>
                          <div class="row">
                            <div class="form-group">
                             <label for="name_package" class="col-sm-3 control-label">Package Name</label>
                             <div class="col-sm-8">
                              <input type="text" class="form-control" id="name_package" name="name_package" value="{{$data->name_package}}">
                            </div>
                              </div>
                            </div>
                          <br>
                         <div class="row">
                          <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="price" name="price" value="{{$data->price}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="kuota" class="col-sm-3 control-label">Kuota</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="kuota" name="kuota" value="{{$data->kuota}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <br>
                      </div>
                      <div class="modal-footer">
                       <center><button type="submit" class="btn btn-success update"> Save</button></center>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
</section>
</section>
</div>
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
    var list = $(dom).attr('data-list');
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
    $('.detail-list').html(list)

    $('#modal-lihat').modal('show')
  }
  </script>
@endsection