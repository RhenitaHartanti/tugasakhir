@extends('layouts.app')
<!-- <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
  <!-- Font Awesome -->
  <!--  <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{('asset/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
 <!--  <link rel="stylesheet" href="{{('asset/dist/css/skins/_all-skins.min.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{('asset/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{('asset/dist/css/skins/_all-skins.min.css')}}">

    @section('content')
     <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Dashboard Setting</h2>
          </div>
        </div>
        <p>    
    </section>
    <section id="about">
      <div class="container">
        <div class="row">          
          <div class="col-lg-12">
            
              <div class="row text-center">
                <div class="col-md-12">         
                   <div class="row">
                      <div class="col-md-12">
          <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Reservation and Payment <i class="fa fa-user"></i> </a></li>
                            <li>  |  </li>
                            <li><a href="#tab_2" data-toggle="tab"> Profile  <i class="fa fa-user"></i></a></li>
                            <li>  |  </li>
                            <li><a href="#tab_4" data-toggle="tab">History  <i class="fa fa-user"></i></a></li>
                          </ul>
            <div class="tab-content">
               <div class="tab-pane" id="tab_2">
                <b>Personal Data</b>
                <p>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="box-body no-padding">
              <table class="table table-striped">
                <!-- @foreach($admin as $value)
                <tr>
                  <td>Name</td>
                  <td>{{$value->name}}</td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td>{{$value->username}}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>{{$value->email}}</td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td>{{$value->password}}</td>
                </tr>
                <tr>
                  <td>No Hp</td>
                  <td>{{$value->nohp}}</td>
                </tr> -->
              </table>
            </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default pull-right">Edit Data</button>
              </div>
              <!-- /.box-footer -->
            </form>
              </div>
              <!-- /.tab-pane -->
             <div class="tab-pane active" id="tab_1">
                <b>Your Order</b>
                <p>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <td>Date Order</td>
                  <td>Package</td>
                  <td>Date Using</td>
                  <td>Time Using</td>
                  <td>Detail Order</td>
                  <td>Status Order</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td> <button type="submit" class="btn btn-default">See Details</button></td>
                  <td></td>
                </tr>
              </table>
            </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default pull-right">Edit Data</button>
              </div>
              <!-- /.box-footer -->
            </form>
            <b>Payment</b>
                <p>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="box-body no-padding">
              <table class="table table-striped">
                
              </table>
            </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default pull-right">Edit Data</button>
              </div>
              <!-- /.box-footer -->
            </form>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <b>Payment</b>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
              <div class="tab-pane" id="tab_4">
                <b>History</b>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>                  
                  </div>
                 </div>
              </div>
            </div>
          </div>
        </div>                   
      </div>                   
    </div>    
  </div>
</div>
</div> 
</div>
</section>

@endsection
    <!-- Bootstrap core JavaScript -->
<script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{('asset/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{('asset/dist/js/demo.js')}}"></script>
