@extends('layouts.app')
<!-- <link rel="stylesheet" href="{{('dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->

  <link rel="stylesheet" href="{{('dashboard/bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{('dashboard/bower_components/Ionicons/css/ionicons.min.css')}}">
  
  <link rel="stylesheet" href="{{('dashboard/dist/css/AdminLTE.min.css')}}"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{('dashboard/dist/css/skins/_all-skins.min.css')}}">
    @section('content')
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <!-- <div class="intro-lead-in">Welcome To Our Event Planner</div> -->
          <div class="intro-heading text-uppercase"></div>
          <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> -->
        </div>
      </div>
    </header> 

    <!-- Services -->
    <section id="logo">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">       
            <center><div class="col-md-4">
             <img src="landingpage/img/d.png">
            </div></center> 
          </div>
        </div>
        </section>
        <section id="services">      
        <div class="row">
          <center> 
          Precious Party Planner is a start up which is engaged in providing services. We provide some packages for your special 
         </center>
          </div>         
        </div>
        <p>
         <div class="row">
          <div class="col-lg-12 text-center">
            <h5>Steps for Order</h5>
          </div>

        </div>
        <div class="row text-center">
          <div class="col-md-4">
           <span class="fa-stack fa-4x">
              <img class="img-fluid" src="img/pesan.png" alt="">
            </span>
            <h6 class="service-heading">Order Package</h6>
            <p class="text-muted">Order package which do you want and fill the form reservation properly</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <img class="img-fluid" src="img/yolo.png" alt="">
            </span>
            <h6 class="service-heading">Waiting</h6>
            <p class="text-muted">Just waiting for the confirmation of the order that you sent. If the confirmation is received, you can doing payment </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <img class="img-fluid" src="img/bayar.png" alt="">
            </span>
            <h6 class="service-heading">Payment Process</h6>
            <p class="text-muted">Doing payment process you can do it twice</p>
          </div>
        </div>
      </div>
    </section>

        <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>            
          </div>
          <p>
          <div class="col-md-6">
            <div class="box">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="name" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Message</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </form>
          </div>
        </div>
        <!-- menambahkan googl maps -->
        <div class="col-md-6">
        <center><h6>Maps</h6></center>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB520Hc03J-TdFR0sFHXYSByLLAMQerNo0&callback=initMap">
    </script>
       </div>
      </div>
    </div>
  </section>
  <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="copyright">Copyright &copy; Precious Party Planner 2018</span>
          </div>          
       </div>
     </div>
  </footer>


   
    <!-- Portfolio Modals -->

@endsection
<!-- <script src="{{('dashboard/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{('dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{('dashboard/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{('dashboard/dist/js/adminlte.min.js')}}"></script>

<script src="{{('dashboard/dist/js/demo.js')}}"></script> -->
  </body>
</html>
