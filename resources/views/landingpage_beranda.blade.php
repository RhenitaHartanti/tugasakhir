@extends('layouts.app')

@section('header')
  <link rel="stylesheet" href="{{asset('asset/css/ionicons.min.css')}}">  
  <link rel="stylesheet" href="{{asset('asset/css/AdminLTE.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('asset/css/skins/_all-skins.min.css')}}">
@endsection

 @section('content')
    <!-- Header -->
    <section id="logo">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">       
            <center><div class="col-md-4">
             <img src="landingpage/img/g.png">
            </div></center> 
          </div>
        </div>
        
        </section>
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <!-- <div class="intro-lead-in">Welcome To Our Event Planner</div> -->
          <div class="intro-heading text-uppercase"></div>
          <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> -->
        </div>
      </div>
    </header> 
     <section id="about"> 
          <div class="row" >
           <div class="col-lg-12 text-center">
          <center> 
          Precious Party Planner is a start up which is engaged in providing services. We provide some packages for your special moment
          </center>
          </div>
          </div>
        </section>
    <br> 
    <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Calendar Reservation</h2>
            <iframe src="https://calendar.google.com/calendar/embed?src=rereradinka%40gmail.com&ctz=Asia%2FJakarta" style="border: 0" width="1100" height="600" frameborder="0" scrolling="no"></iframe>
          </div>
        </div>      
        <section id="services">    
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
     <section id="services">    
        <p>
         <div class="row">
          <div class="col-lg-12 text-center">
            <h5>Terms and Conditions</h5>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-6">           
            <h6 class="service-heading">You can order</h6><p>
            <h8 class="service-heading">Reservation Terms</h8><p>
          </div>
          <div class="col-md-6">
            <h6 class="service-heading">Payment Terms</h6><p>
            <h8 class="service-heading">You can doing payment process in twice (DP and Paid Off)</h8><p>
            <h8 class="service-heading">You can doing payment process only by transfer</h8><p>
            <h8 class="service-heading">You can upload </h8><p>             
          </div>
        </div>
      </div>
    </section>
    
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2> <p>                        
          </div>
          <p>
          <div class="col-md-6">
            <form class="form-horizontal" action="{{url('/landingpage_beranda')}}" method="post">
              {{csrf_field()}}
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
                  <label for="exampleInputPassword1">No Hp</label>
                  <input type="nohp" class="form-control" id="nohp" name="nohp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Message</label>
                  <textarea class="form-control" id="password" name="password"></textarea>
                </div>                              
              </div>
              <div class="box-footer">
                <center><button type="submit" class="btn btn-primary">Send</button></center>
              </div>
            </form>  
        </div>
                <!-- menambahkan googl maps -->
        <div class="col-md-6">
       
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4598809275953!2d110.19219281450171!3d-7.5247129945728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8efa2c540f3b%3A0x1b00c6767784339b!2sPerumahan+Bagongan+Asri!5e0!3m2!1sid!2sid!4v1524232016733" width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    
      </div>
      </div>
    </div>
  </section>   
    <!-- Portfolio Modals -->

@endsection

@section('js')
<script src="{{asset('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{asset('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('asset/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('asset/dist/js/demo.js')}}"></script>
@endsection
