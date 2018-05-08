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
            			</div>
            			<br>
               			<div class="box-body">
                           <div class="col-md-12">
                              <input type="hidden" value="-" name="id_payment">          
                          </div>
                          <br>
            <div class="row">
                	<div class="form-group">
                        <label for="booking_code" class="col-sm-4 control-label">Booking Code</label>
                        <div class="col-sm-6 detail-booking_code">
                        	<div class="col-sm-8">
                        		<b>{{$payments->booking_code}}</b>
                        	</div>
                         </div>
                    </div>
             </div>
             <br>
             <div class="row">
                    <div class="form-group">
                        <label for="attach" class="col-sm-4 control-label">Attach</label>
                           <div class="col-sm-6 detail-attachment">
                    	       <div class="col-sm-8">
                            		<img src="{{url('/img/buktitransfer/'.$payments->attachment)}}" style="width: 150px; height:150px;">
                            	</div>
                          	</div>
                     </div>
              </div>
              <br>
              	<form enctype="multipart/form-data" method="POST" action="{{URL::to('updateStatusPayment/'.$payments->id_order)}}" role="form">
                	{{csrf_field()}}
              			<div class="box-footer">
                			<input type="hidden" value="paid off" name="payment_status"> 
				                <center>
				                  <center><button class="btn btn-sm btn-success">Confirm</button></center>
				               </center>
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