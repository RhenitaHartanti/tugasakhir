@extends('layouts.app')
@section('header')
@endsection
@section('content')
 <div class="container">
    <div class="col-lg-12"> 
      <div class="row">        
        <div class="formorder">    
         <label><h6><b>You Order : </label>  {{$package->name_package}}</b></h6><p>
          <form action="{{route('orders.store')}}" method="post">     
            @csrf
              <input type="hidden" value="{{$id}}" name="id_package">
              <label>Using Date</label>
            <div class="form-group has-feedback">
               <input type="date" class="form-control" name="date_using" required="">
            </div>
              <label>Using Time</label>
            <div class="form-group has-feedback">
              <input type="time" class="form-control" name="time_using" required="">
            </div>
             <label>Finish Time</label>
            <div class="form-group has-feedback">
              <input type="time" class="form-control" name="time_finish" required="">
            </div>
              <label>Theme (Color and Custom Caracter)</label>
            <div class="form-group has-feedback">
             <input type="text" class="form-control" name="theme" required="">
            </div>
              * Kuota for this package is <b>{{$package->kuota}} people </b>. If you want to add the guest, you have to add Rp 100.000/person 
            <br>
           <label>Additional Guests</label>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" name="total_guests" value="0" min="0" required="">        
          </div>
      </div>
      <div class="col-lg-6"> 
       <div class="formorder">      
            <label>Place</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="place" required=""></textarea>
           </div>
            <label>Greeting</label>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="greeting" required=""></textarea>
          </div>
           <label>Note (You can input your request)</label>
          <div class="form-group">
            <textarea class="form-control" rows="5" name="note" required=""></textarea>
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
@endsection
    
