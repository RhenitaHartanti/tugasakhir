@extends('layouts.app')
@section('header')
@endsection
@section('content')
   <section class="order">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Order</h2>
        </div>
    <br>
    <table class="table table-striped text-center" style="color:#000000"> 
        <tr>
          <th>ID Order</th>
          <th>Date Order</th>
          <th>Name Package</th>
         <!--  <th>Start Date</th>
          <th>Finish Date</th>    -->      
          <th>Detail Order</th>
          <th>Order Status</th>   
          <th>Total Payment</th>    
          <th>Payment Process</th> 
          <th>Payment Status</th>
        </tr>
         @foreach($order as $value) 
         @php
                $pnjg = strlen($value->id);
                if($pnjg==1){
                  $id = 'ORD00'.$value->id;
                }elseif($pnjg==2){
                  $id = 'ORD0'.$value->id;
                }else{
                  $id = 'ORD'.$value->id;
                }
                @endphp    
        <tr>
          <td>{{$id}}</td>
          <td>{{$value->created_at}}</td>          
          <td>{{$value->package->name_package}}</td>
          <!-- <td>{{$value->date_using}}</td>
          <td>{{$value->date_finish}}</td>  -->       
          <td><button onclick="detailOrder(this)" data-name_package="{{$value->package->name_package}}" data-date_using="{{$value->date_using}}" data-date_finish="{{$value->date_finish}}" data-theme="{{$value->theme}}" data-place="{{$value->place}}" data-guest="{{$value->package->kuota+$value->total_guests}}" data-greeting="{{$value->greeting}}" data-note="{{$value->note}}" data-total_payment="{{$value->total_payment}}" data-list="{{$value->package->assets->implode('name_asset',', ')}}"class="btn btn-sm btn-primary">See Detail Order</button></td>
          <td><b>{{$value->order_status}}</b></td>
          <td>Rp . {{$value->total_payment}}</td>
          <td>
            @if($value->order_status!='accept')
            -
            @else
            <button class="btn btn-sm btn-primary"><a href="{{URL::to('landingpage_formbayar/'.$value->id)}}" style="color:#ffffff;">confirm</a></button></td>
            @endif
          <td><b>{{$value->payment_status}}</b></td>     
        </tr>   
           @endforeach
     </table>
    </div>   
</section>   
      @foreach($order as $value) 
      <div id="modal-lihat" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-md">
        <div class="modal-content">
         <img src="img/logo6.jpg" alt="">
          <br>
           <form class="form-horizontal" method="POST" action="">
            <div class="box-body">
             <div class="form-group">
              <label for="date_using" class="col-md-12 control-label">Name Package : </label>
               <div class="col-sm-12 detail-name_package">            
                <input type="text" readonly disabled class="form-control" id="name_package" name="name_package" value="{{$value->name_package}}">                  
                </div>
                </div>
              <div class="form-group">
                label for="date_using" class="col-md-12 control-label">Date Using : </label>
                <div class="col-sm-12 detail-theme">            
                <input type="text" readonly disabled class="form-control" id="date_using" name="date_using" value="{{$value->date_using}}">                  
                </div>
              </div>
              <div class="form-group">
               <label for="time_using" class="col-md-12 control-label">Date Finish : </label>
                <div class="col-sm-12 date_finish">            
                  <input type="text" readonly disabled class="form-control" id="date_finish" name="date_finish" value="{{$value->date_finish}}">                  
                </div>
              </div>
              <div class="form-group">
                <label for="theme" class="col-md-12 control-label">Theme (Custom theme or character) : </label>
                <div class="col-sm-12 detail-theme">            
                 <input type="text" readonly disabled class="form-control" id="theme" name="theme" value="{{$value->theme}}">
                </div>
              </div>
              <div class="form-group">
               <label for="place" class="col-md-12 control-label">Place (include the complete address) : </label>
                <div class="col-sm-12 detail-place">                  
                 <input type="text" readonly disabled class="form-control" id="place" name="place" value="{{$value->place}}">
                </div>
              </div>
              <div class="form-group">
               <label for="guest" class="col-md-12 control-label">Total Guests : </label>
                <div class="col-sm-12 detail-total">                  
                 <input type="text" readonly disabled class="form-control" id="guest" name="total_guests">
                </div>
              </div>
              <div class="form-group">
               <label for="greeting" class="col-md-12 control-label">Greeting : </label>
                <div class="col-sm-12 detail-greet">                  
                 <input type="text" readonly disabled class="form-control" id="greeting" name="greeting"
                   value="{{$value->greeting}}">
                </div>
              </div>
              <div class="form-group">
               <label for="note" class="col-md-12 control-label">Note : </label>
                <div class="col-sm-12 detail-note">                  
                 <input type="text" readonly disabled class="form-control" id="note" name="note" value="{{$value->note}}">
                </div>
              </div>
             <div class="form-group">
              <label for="note" class="col-md-12 control-label">Total Payment </label>
               <div class="col-sm-12 detail-total_payment">                  
                <input type="text" readonly disabled class="form-control" id="total_payment" name="total_payment" value="{{$value->total_payment}}">
               </div>
             </div>
             <div class="form-group">
              <label for="note" class="col-md-12 control-label">List Asset : </label>
               <div class="col-sm-12 detail-list">                  
                <input type="text" readonly disabled class="form-control" id="list" name="list" value="{{$value->package->assets->implode('name_asset',', ')}}">
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
  @endforeach
@endsection
@section('js')
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- <script src="js/jqBootstrapValidation.js"></script> -->
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
    var name_package = $(dom).data('name_package');
    var date_using = $(dom).data('date_using');
    var date_finish = $(dom).data('date_finish'); 
    var theme = $(dom).data('theme');
    var place = $(dom).data('place');
    var guest = $(dom).data('guest');
    var greeting = $(dom).data('greeting');
    var note = $(dom).data('note');
    var total_payment = $(dom).data('total_payment');
    var list = $(dom).data('list');
    $('#name_package').val(name_package)
    $('#date_using').val(date_using)
    $('#date_finish').val(date_finish) 
    $('#theme').val(theme)
    $('#place').val(place)
    $('#guest').val(guest)
    $('#greet').val(greeting)
    $('#note').val(note)
    $('#total_payment').val(total_payment)
    $('#list').val(list)
    $('#modal-lihat').modal('show')
  }
  </script>
@endsection