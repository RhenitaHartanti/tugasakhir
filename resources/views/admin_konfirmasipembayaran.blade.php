<div class="content-wrapper">
  <section class="content-header">
    <section class="content">
      <div class="row">
        <center>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              </div>
                <div class="box-body">
                <div class="col-md-12">
                  <input type="hidden" value="-" name="id_payment">           
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <label for="booking_code" class="col-sm-4 control-label">Booking Code</label>
                      <div class="col-sm-6 detail-booking_code">
                        <div class="col-sm-8"><br>
                          <b>{{$payments->booking_code}}</b>
                        </div>
                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <label for="attach" class="col-sm-4 control-label">File Attachment :</label><br>
                      <div class="col-sm-6 detail-attachment">
                        <div class="col-sm-8"><br>
                          <img src="{{url('/img/buktitransfer/'.$payments->attachment)}}" style="width: 350px; height:350px;">
                          </div>
                      </div>
                  </div>
                </div>
                <br>
                <form enctype="multipart/form-data" method="POST" action="{{URL::to('accBookingCode/'.$payments->id)}}" role="form">
                  {{csrf_field()}}
                    <div class="box-footer">
                      <input type="hidden" value="{{$payments->booking_code}}" name="booking_code"> 
                        <center>
                          <center>
                            <button href="{{URL::to('admin_listreservation')}}" class="btn-sm btn-success">Reject Payment</button></td>
                            <td>
                            <button class="btn-sm btn-success">Confirm Payment</button>
                          </center>
                       </center>
                    </div>
                </form>
              </div>
           </div>
         </center>
        </div> 
  </section>
</section>
</div>