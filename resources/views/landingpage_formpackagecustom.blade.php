@extends('layouts.app')
@section('header')
@endsection
@section('content')
 <div class="container">
    <div class="col-lg-12"> 
      <div class="row">        
        <div class="formorder">    
         <label><h5><b>You Order the Custom Package </label></b></h5><p>
          <form action="{{route('orders.store')}}" method="post">     
            @csrf
              <input type="hidden" value="custom" name="type">
              <label>Your Name Package</label>
            <div class="form-group has-feedback">              
               <input type="text" class="form-control" name="name_package" required="">
            </div>
              <label>Start Time</label>
            <div class="form-group has-feedback">              
               <input type="text" class="datetimepicker-input" id="datetimepicker" data-toggle="datetimepicker" data-target="#datetimepicker" name="date_using" required=""> 
            </div>
              <label>End Time</label>
            <div class="form-group has-feedback">
              <input type="text" class="datetimepicker-input" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" name="date_finish" required=""> 
            </div>
              <label>Theme (Color and Custom Caracter)</label>
            <div class="form-group has-feedback">
             <input type="text" class="form-control" name="theme" required="">
            </div>
           <label>Total Guests</label>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" name="total_guests" value="0" min="0" required="">
          </div>
          <label>Place (Input the name and address properly)</label>
          <div class="form-group">
            <textarea class="form-control" rows="2" name="place" required=""></textarea>
           </div>
      </div>
      <div class="col-lg-6"> 
       <div class="formorder">      
            
            <label>Greeting</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="greeting" required=""></textarea>
          </div>
           <label>Note (You can input your request dan note)</label>
          <div class="form-group">
            <textarea class="form-control" rows="5" name="note" required=""></textarea>
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
          <center><button type="submit" style="background:#CCB20A">Send Order</button></center>
          </div>   
      </form>
    </div>
  </div>
</div>
@endsection 
@section('js')
<script type="text/javascript">
   $('.js-aset').select2();
  $('.datetimepicker').datetimepicker({
    // format: 'Y-m-d','HH-ii',
    // autoclose: true,
    startDate: '+3d'
  });
  
  // alert()
</script>
@endsection