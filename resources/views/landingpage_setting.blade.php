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
          <th>Detail Order</th>
          <th>Order Status</th>        
          <th>Payment Process</th> 
          <th>Payment Status</th>
        </tr>
         @foreach($order as $value)     
        <tr>
          <td>{{$value->id}}</td>
          <td>{{$value->date_using}}</td>
          <td>{{$value->time_using}}</td>
          <td><button onclick="detailOrder(this)" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihat">See Detail Order</button></td>
          <td>{{$value->order_status}}</td>
          <td>
            @if($value->order_status!='accept')
            <button class="btn btn-sm btn-primary">payment proces</button>
            @else
            <button class="btn btn-sm btn-primary"><a href="{{URL::to('landingpage_formbayar/'.$value->id)}}">payment proces</a></button></td>
            @endif
          <td>{{$value->payment_status}}</td> 

<div id="modal-lihat" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo6.jpg" alt="">
             <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="theme" class="col-md-12 control-label">Theme (Custom theme or character) : </label>
                  <div class="col-sm-12 detail-theme">            
                    <input type="text" readonly class="form-control" id="theme" name="theme" value="{{$value->theme}}">                  
                  </div>
                  <br>
                <div class="form-group">
                  <label for="place" class="col-md-12 control-label">Place (include the complete address) : </label>
                  <div class="col-sm-12 detail-place">                  
                  <input type="text" readonly class="form-control" id="place" name="place" value="{{$value->place}}">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="guest" class="col-md-12 control-label">Total Guests : </label>
                  <div class="col-sm-12 detail-total">                  
                  <input type="text" readonly class="form-control" id="total_guests" name="total_guests" value="{{$value->total_guests}}">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="greeting" class="col-md-12 control-label">Greeting : </label>
                  <div class="col-sm-12 detail-greet">                  
                  <input type="text" readonly class="form-control" id="greeting" name="greeting" value="{{$value->greeting}}">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="note" class="col-md-12 control-label">Note : </label>
                  <div class="col-sm-12 detail-note">                  
                  <input type="text" readonly class="form-control" id="note" name="note" value="{{$value->note}}">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">Back</span></button></center>
              </center>
              <br>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>


          @endforeach          
        </tr> 
                    
      </table>
    </div>   
</section>
            

      <div id="modal-payment" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo12.jpg" alt="">          
             <br>             
              <form enctype="multipart/form-data" method="POST" action="/uploadBukti" role="form">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
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
              </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" type="submit" class="close" data-dismiss="modal"><span aria-hidden="true">OK</span></button></center>
              </center>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>    
      </div>
      </div>
             </form>
          </div>
        </div>
    </div>




@endsection
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    <script type='text/javascript'>  
    function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
  </script>
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
  </body>

</html>
