@extends('layouts.layoutadmin')

@section('content')
<div class="content-wrapper">
<section class="content-header">
         
    <section class="content">
    	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List Reservation</li>
      </ol>
   <p>
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>List Reservation</center></h4>
              <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Data Reservation</button>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
               
                <tr>
                  
                  <td>Id Reservation</td>
                  <td>Name</td>
                  <td>Package</td>
                  <td>Order Date</td>
                  <td>Using Date</td>
                  <td>Using Time</td>
                  <td>Details Reservation</td>
                  <td>Payment Status</td>
                  <td>Action</td>
                </tr>
                
                <tbody>
                <tr>
                                
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-lihat">See Detail</button></td>
                  <td><button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-payment">Detail Payment</button></td>
                  
                  <td><button type="button" class="btn btn-sm btn-default"><a href="{{URL('edit_order')}}"><span class="glyphicon glyphicon-pencil"> Edit</button>   <button type="button" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"> Delete</button></td>
                </tr>
                </tfoot>
              </table>
            </div>

      <!-- /.row -->
    </section>
</div>
 </section>

<div id="modal-lihat" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo12.jpg" alt="">
            <div class="modal-header">
             
              <center><h4 class="modal-title" id="myModalLabel">Detail Reservation</h4></center>
            </div>
             <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Nama yang Bersangkutan</label>

                  <div class="col-sm-8">
                    <input type="name" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="theme" class="col-sm-4 control-label">Theme (Custom theme or character)</label>

                  <div class="col-sm-8">
                    <input type="theme" class="form-control" id="theme" name="theme">
                  </div>
                </div>
                <div class="form-group">
                  <label for="place" class="col-sm-4 control-label">Place (Sertakan alamatnya)</label>

                  <div class="col-sm-8">
                    <input type="place" class="form-control" id="place" name="place">
                  </div>
                </div>
                <div class="form-group">
                  <label for="guest" class="col-sm-4 control-label">Total Guest</label>

                  <div class="col-sm-8">
                    <input type="guest" class="form-control" id="guest" name="guest">
                  </div>
                </div>
                <div class="form-group">
                  <label for="greeting" class="col-sm-4 control-label">Greeting</label>

                  <div class="col-sm-8">
                    <input type="greeting" class="form-control" id="greeting" name="greeting">
                  </div>
                </div>
                <div class="form-group">
                  <label for="note" class="col-sm-4 control-label">Note</label>

                  <div class="col-sm-8">
                    <input type="note" class="form-control" id="note" name="note">
                  </div>
                </div>
                <div class="form-group">
                  <label for="request" class="col-sm-4 control-label">Request</label>

                  <div class="col-sm-8">
                    <input type="request" class="form-control" id="request" name="request">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">OK</span></button></center>
              </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>

    <div id="modal-payment" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
             <img src="img/logo12.jpg" alt="">
            <div class="modal-header">
             
              <center><h4 class="modal-title" id="myModalLabel">Detail Payment</h4></center>
            </div>
             <form class="form-horizontal">
              <div class="box-body">
                  <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Payment 1
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header"><a href="#">Date Payment 1</a></h3>
                 <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <h3 class="timeline-header no-border"><a href="#">Photo</a></h3>
                 <img src="http://placehold.it/150x100" alt="..." class="margin">
              </div>
            </li>  
            <li class="time-label">
                  <span class="bg-red">
                    Payment 2
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header"><a href="#">Date Payment 1</a></h3>
                 <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <h3 class="timeline-header no-border"><a href="#">Photo</a></h3>
                 <img src="http://placehold.it/150x100" alt="..." class="margin">
              </div>
            </li>             
          </ul>
          <center><button class="btn btn-sm btn-success" class="close" data-dismiss="modal"><span aria-hidden="true">OK</span></button></center>
        </div>    
      </div>
      </div>
              <!-- /.box-body -->
              
            </form>
          </div>
        </div>
    </div>

    
    </section>
  </div>
    </section>
@endsection