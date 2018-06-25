@extends('layouts.app')
@section('header')
@endsection
@section('content')
<br>
<br>
 <div class="container">
    <div class="col-lg-12"> 
      <div class="row">        
        <div class="login3">
        <div class="row">
         <img src="{{asset('landingpage/img/logo9.jpg')}}">
         </div>
         <br>
         <center><label><h6><b>Form Reservation {{$package->name_package}}</b></h6></label></center>
          <form action="{{route('orders.store')}}" method="post" name="order" data-toggle="validator" role="form">     
            @csrf
              <input type="hidden" value="{{$id}}" name="id_package">
              <label>Date & Time</label>
            <div class="form-group has-feedback">              
               <input type="text" class="form-control datetimepicker start-time" name="date_using" required=""> 
            </div>
              <!-- <label>End Time</label>
            <div class="form-group has-feedback">
              <input type="text" class="form-control datetimepicker end-time" name="date_finish" required="" readonly=""> 
            </div> -->
              <label>Theme (Color and Custom Caracter)</label>
            <div class="form-group">
             <input type="text" class="form-control" id="theme" name="theme" data-error="theme  is required" required placeholder="example : gold or disney"><div class="help-block with-errors" style="color:#DF0101; font-size:14px;"></div>
            </div>
              * Quota for this package is <b>{{$package->kuota}} people </b>. If you want to add the guest, you have to add Rp 100.000/person 
            <br>
            <br>
           <label>Additional Guests</label>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" name="total_guests" value="0" min="0" required="">        
          </div>             
            <label>Place (Input the name and address properly)</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="place" required="" id="place" data-error="place  is required" required placeholder="example : Secret Garden, Jl. Amri Yahya No. 2, Pakuncen, Wirobrajan, Pakuncen, Wirobrajan, Kota Yogyakarta"></textarea>
            <div class="help-block with-errors" style="color:#DF0101; font-size:14px;"></div>
          </div>            
            <label>Greeting</label>
          <div class="form-group">
            <textarea class="form-control" rows="2" name="greeting"></textarea>
          </div>
           <label>Note (You can input your request dan note)</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="note" required=""></textarea>
          </div>
             <input type="hidden" value="{{$package->price}}" name="price">
             <input type="hidden" value="-" name="booking_code">           
             <input type="hidden" value="waiting" name="order_status">
             <input type="hidden" value="none" name="payment_status">
         <div class="row">
          <center><button type="submit" style="background:#CCB20A; margin-left: 150px;" id="submit">Send Order</button></center>
          </div>   
      </form>
    </div>
  </div>
</div>
@endsection 
@section('js')
  <script type="text/javascript">
            $(function () {
                $('.datetimepicker').datetimepicker({
                  format:'YYYY-MM-DD hh:mm A',
                  minDate:moment().add(7,'d').format('YYYY-MM-DD'),
                  sideBySide: true
                });
                $('.start-time').on('dp.change', function(e){
                 // $('.end-time').data("DateTimePicker").minDate(moment(e.date).add(3,'h')).maxDate(moment(e.date).add(10,'h'))

                 $("#submit").attr("disabled", true);
                 $.ajax({url: "/cektanggal/" + $(this).val(), success: function(result){
                   if(result=='false'){
                     swal({
                      title: "Opps Sorry",
                      text: "The date has been chooseen",
                      icon: "error",
                      buttons: false,
                      dangerMode: true,
                      })
                    }
                    else{
                       $("#submit").attr("disabled", false);
                    }
                  }})
                });
            
          })
        </script>
@endsection