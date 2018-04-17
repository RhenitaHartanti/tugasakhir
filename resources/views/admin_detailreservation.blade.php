@extends('layouts.layoutadmin')

@section('content')
<div class="content-wrapper">
<section class="content-header">
         
    <section class="content">
    	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List Reservation</li>
        <li class="active">Detail Reservation</li>
      </ol>
   <p>
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>Detail Reservation</center></h4>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="name" placeholder="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="place" class="col-sm-2 control-label">Place</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Theme</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Guests</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Greeting</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Option++</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div> 
                  </div>

              </div>
              
            </div>

      <!-- /.row -->
    </section>
</div>
 </section>
@endsection