@extends('layouts.app')
@section('header')
@endsection
@section('content')
<br>
<br>
 <div class="container">
    <div class="col-lg-12"> 
      <div class="row">        
       <div class="login4">
        <div class="row">
         <img src="img/logo9.jpg" alt="">
        </div>  
        <br>
         <center><label><h6><b>Form Reservation Event Package Custom</b></h6></label></center>
         <br>   
          <form action="{{route('orders.store')}}" method="post" data-toggle="validator" role="form">     
            @csrf
              <input type="hidden" value="custom" name="type">
              <label>Your Name Package</label>
            <div class="form-group has-feedback">              
              <input type="text" class="form-control" id="name_package" name="name_package" data-error="name package  is required" placeholder="Anna birthday party" required><div class="help-block with-errors" style="color:#DF0101; font-size:14px;"></div>
            </div>
              <label>Date & Time</label>
            <div class="form-group has-feedback">              
               <input type="text" class="form-control datetimepicker start-time" name="date_using" required=""> 
            </div>
              <!-- <label>End Time</label>
            <div class="form-group has-feedback">
              <input type="text" class="datetimepicker-input" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" name="date_finish" required=""> 
            </div> -->
              <label>Theme (Color and Custom Caracter)</label>
            <div class="form-group has-feedback">
             <input type="text" class="form-control" id="theme" name="theme" data-error="theme  is required" required placeholder="example : gold or disney"><div class="help-block with-errors" style="color:#DF0101; font-size:14px;"></div>
            </div>
           <label>Total Guests</label>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" id="total_guests" name="total_guests" value="0" min="0" data-error="total guests is required" required><div class="help-block with-errors" style="color:#DF0101; font-size:14px;">
          </div>
        </div>
          <label>Place (Input the name and address properly)</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="place" required="" id="place" data-error="place  is required" required placeholder="example : Secret Garden, Jl. Amri Yahya No. 2, Pakuncen, Wirobrajan, Pakuncen, Wirobrajan, Kota Yogyakarta "></textarea>
            <div class="help-block with-errors" style="color:#DF0101; font-size:14px;"></div>
          </div>      
       <label>Greeting</label>
          <div class="form-group">
            <textarea class="form-control" rows="2" name="greeting" required=""></textarea>
          </div>
           <label>Note (You can input your request dan note)</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="note" required=""></textarea>
          </div>
          <label>List Asset</label>
            <div class="form-group">
                <select class="form-control js-aset" name="id_asset[]" multiple="multiple" style="width:100%">
                    @foreach($assets as $value)
                  <option value="{{$value->id}}">{{$value->name_asset}}</option>
                    @endforeach
                </select>
              </div>            
             <input type="hidden" value="-" name="booking_code">           
             <input type="hidden" value="waiting" name="order_status">
             <input type="hidden" value="none" name="payment_status">
         <div class="row">
          <center><button type="submit" style="background:#CCB20A; margin-left: 150px;">Send Order</button></center>
          </div>   
      </form>
    </div>
  </div>
</div>
@endsection 
@section('js')
<script type="text/javascript">
  $('.js-aset').select2();
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