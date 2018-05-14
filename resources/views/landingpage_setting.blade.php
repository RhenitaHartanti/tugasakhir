@extends('layouts.app')
@section('header')
  <link rel="stylesheet" href="{{asset('asset/css/ionicons.min.css')}}">  
  <link rel="stylesheet" href="{{asset('asset/css/AdminLTE.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('asset/css/skins/_all-skins.min.css')}}">
@endsection
@section('content')
   <section class="order">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Order</h2>
            <h3 class="section-subheading text-muted"><!-- You can  see our documentation event and package in this gallery --></h3>
        </div>
<!-- Tab content -->  
  <!-- <p>
    @foreach($order as $data)
      @if($data->order_status=='accept'&& $data->date_using>=\Carbon\Carbon::now()->format('Y-m-d'))
      <div class="notif"> 
        Your order with <b>Id Order {{$data->id}}</b> is <b>{{$data->order_status}}</b>
      </br>
         Your Kode Booking is :<b> {{$data->booking_code}}</b><p>   
      </div>
      @endif
    @endforeach    --> 
    <table class="table table-striped text-center"> 
        <tr>
          <th>ID Order</th>
          <th>Date Using</th>
          <th>Time Using</th>
          <th>Time Finish</th>          
          <th>Detail Order</th>
          <th>Order Status</th>   
          <th>Total Payment</th>    
          <th>Payment Process</th> 
          <th>Payment Status</th>
        </tr>
         @foreach($order as $value)     
        <tr>
          <td>{{$value->id}}</td>
          <td>{{$value->date_using}}</td>
          <td>{{$value->time_using}}</td>
          <td>{{$value->time_finish}}</td>          
          <td><button onclick="detailOrder(this)" data-date_using="{{$value->date_using}}" data-time_using="{{$value->time_using}}" data-time_finish="{{$value->time_finish}}" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->package->kuota+$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" class="btn btn-sm btn-primary">See Detail Order</button></td>
          <td>{{$value->order_status}}</td>
          <td>{{$value->total_payment}}</td>
          <td>
            @if($value->order_status!='accept')
            <button class="btn btn-sm btn-primary">payment proces</button>
            @else
            <button class="btn btn-sm btn-primary"><a href="{{URL::to('landingpage_formbayar/'.$value->id)}}">payment proces</a></button></td>
            @endif
          <td>{{$value->payment_status}}</td> 
          @endforeach          
        </tr>                     
      </table>
    </div>   
</section>

      <div id="modal-lihat" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo6.jpg" alt="">
             <br>
             <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="date_using" class="col-md-12 control-label">Date Using : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly class="form-control" id="date_using" name="date_using" value="{{$value->date_using}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="time_using" class="col-md-12 control-label">Time Using : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly class="form-control" id="time_using" name="time_using" value="{{$value->time_using}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="time_fiish" class="col-md-12 control-label">Time Finish : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly class="form-control" id="time_finish" name="time_finish" value="{{$value->time_finish}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="theme" class="col-md-12 control-label">Theme (Custom theme or character) : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly class="form-control" id="theme" name="theme" value="{{$value->theme}}">                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="place" class="col-md-12 control-label">Place (include the complete address) : </label>
                  <div class="col-sm-12 detail-place">                  
                  <input type="text" readonly class="form-control" id="place" name="place" value="{{$value->place}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="guest" class="col-md-12 control-label">Total Guests : </label>
                  <div class="col-sm-12 detail-total">                  
                  <input type="text" readonly class="form-control" id="guest" name="total_guests">
                  </div>
                </div>
                <div class="form-group">
                  <label for="greeting" class="col-md-12 control-label">Greeting : </label>
                  <div class="col-sm-12 detail-greet">                  
                  <input type="text" readonly class="form-control" id="greeting" name="greeting" value="{{$value->greeting}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Note : </label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly class="form-control" id="note" name="note" value="{{$value->note}}">
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
     
@endsection
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/agency.min.js"></script>
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
    var date_using = $(dom).data('date_using');
    var time_using = $(dom).data('time_using'); 
    var time_finish = $(dom).data('time_finish');  
    var theme = $(dom).data('theme');
    var place = $(dom).data('place');
    var guest = $(dom).data('guest');
    var greeting = $(dom).data('greeting');
    var note = $(dom).data('note');
    $('#date_using').val(date_using)
    $('#time_using').val(time_using) 
    $('#time_finish').val(time_finish)
    $('#theme').val(theme)
    $('#place').val(place)
    $('#guest').val(guest)
    $('#greet').val(greeting)
    $('#note').val(note)
    $('#modal-lihat').modal('show')
  }
  </script>
</body>
</html>
