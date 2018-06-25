@extends('layouts.app')
@section('header')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<br>
<br>
    <header class="" style="background-color:rgba(0,0,0,0);">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/b3.jpg" alt="First Slide">
            </div>
            <div class="item">
                <img src="img/b9.jpg" alt="Second Slide">
            </div>
            <div class="item">
                <img src="img/b12.jpg"  alt="Third Slide">                
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" style="color:#ffffff"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" style="color:#ffffff"></span>
        </a>
    </div>
      <div class="container">
        <!-- <div class="col-lg-12" style="background-color:rgba(0,0,0,0.1); height:200px; width:2500px; border-radius: 10px;position: relative;top: 40vh; padding-top:30px; alignment-baseline:left; font-size:30px; color:#fffff; font-family:cursive;">
          We design with heart, we decor with passion, we give you the best<br>We are Precious Party Planner.
          <br>
          <div class="col-lg-12 text-center" style="font-size:25px; color:#000000; font-family:serif;">Reservation event planner website for your precious moment</div>
            </div> -->
      </div>
    </header> 
  <section class="col-lg-12 text-center" id="services" style=" background-color:#000000; font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:italic; font-size:20px; color:#B8860B;">make your moment be more precious with us<br>
    <div class="col-lg-12 text-center" style="font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:bold; font-size:16px; color:#B8860B;">
    Event Planner Reservation Website
    </div>
  </section>
  <section id="services">    
    <p>
    <div class="row"> 
      <div class="col-lg-12 text-center">
        <h4>How to Order Package Event ? </h4>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-3">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/ia.png" alt="">
        </span>
      <p class="text-muted" style="font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:italic; font-size:15px; color:#B8860B;">Order package which do you want and fill the form reservation properly</p>
      </div>
      <div class="col-md-3">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/ib.png" alt="">
        </span>
        <br>                                             
          <p class="text-muted" style="font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:italic; font-size:15px; color:#B8860B;">Wait the confirmation and check your email</p>
      </div>
      <div class="col-md-3">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/ic.png" alt="">
        </span><br>
          <p class="text-muted" style="font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:italic; font-size:15px; color:#B8860B;">Doing the payment process by transfer</p>
      </div>
      <div class="col-md-3">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/id.png" alt="">
        </span><br>
          <p class="text-muted" style="font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:italic; font-size:15px; color:#B8860B;">Doing the payment confirmation by upload your invoice</p>
      </div>
    </div>
  </div>
</section>  
<hr>
  <section id="contact"> 
    <div class="row">
      <center><div class="col-lg-10 text-center">
        <div class="calender">
        <h2 class="section-heading text-uppercase">CALENDAR RESERVATION</h2>
        <br>
           {!! $calendar->calendar() !!}
      </div>
    </div></center>
  </div> 
  </section>     
  <section id="services">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="section-heading text-uppercase">Contact Us</h2> <p>                        
      </div>
      <p>
        <div class="col-md-4">
          <form class="form-horizontal" action="{{url('/landingpage_beranda')}}" method="post">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                <img class="img-fluid" src="img/logo14.jpg"><br><br>
              <div class="col-lg-12" style="font-family:font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style:italic; font-size:15px; color:#B8860B;">
                Precious Party Planner adalah sebuah penyedia jasa dekorasi dan persiapan acara. Untuk info lebih lanjut, silahkan hubungi dan follow akun dibawah ini.
              <br><br>
              <div class="form-group">
                  <img class="img-fluid" src="img/ig.png" alt=""><span> @mglpartyplanner</span>
                </div>
                <div class="form-group">
                  <img class="img-fluid" src="img/fb.png" alt=""><span> Precious Party Planner</span>
                </div>
                 <div class="form-group">
                  <img class="img-fluid" src="img/li.png" alt=""><span> @mglpartyplanner</span>
                </div>
                <div class="form-group">
                  <img class="img-fluid" src="img/wa.png" alt=""><span> 085 743 680 646</span>
                </div> 
              </div>
            </div>
                                             
              </div>
              <div class="box-footer">
                <center></center>
              </div>
            </form>  
        </div>
<div class="col-md-8">       
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4598809275953!2d110.19219281450171!3d-7.5247129945728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8efa2c540f3b%3A0x1b00c6767784339b!2sPerumahan+Bagongan+Asri!5e0!3m2!1sid!2sid!4v1524232016733" width="700" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>   
</div>
    </div>
  </div>
</section>

@endsection
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
    <script type="text/javascript">
    $(document).ready(function(){
     $("#myCarousel").carousel({
         interval : 1500;
     });
});
    </script>

@endsection