@extends('layouts.app')
@section('header')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
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
          <div class="intro-heading text-uppercase"></div>
        </div>
      </div>
    </header> 
   <section id="about"> 
      <div class="row" >
        <div class="col-lg-12 text-center"><center> 
        Precious Party Planner is a start up which is engaged in providing services. We provide some packages for your special moment</center>
        </div>
      </div>
  </section>
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
    <p>
    <div class="row"> 
      <div class="col-lg-12 text-center">
        <h3>Steps for Order</h3>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-4">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/pesan.png" alt="">
        </span>
          <p class="text-muted">Order package which do you want and fill the form reservation properly</p>
      </div>
      <div class="col-md-4">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/yolo.png" alt="">
        </span>
        <br>                                             
          <p class="text-muted">Wait the confirmation of the order that you sent. And check your email to knowing the booking code</p>
      </div>
      <div class="col-md-4">
        <span class="fa-stack fa-4x">
          <img class="img-fluid" src="img/bayar.png" alt="">
        </span><br>
          <p class="text-muted">Doing the payment process by transfer and upload your invoice</p>
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
        <div class="col-md-4">
          <form class="form-horizontal" action="{{url('/landingpage_beranda')}}" method="post">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <img class="img-fluid" src="img/ig.png" alt=""><span> @mglpartyplanner</span>
                </div>
                <div class="form-group">
                  <img class="img-fluid" src="img/fb.png" alt=""><span> @mglpartyplanner</span>
                </div>
                 <div class="form-group">
                  <img class="img-fluid" src="img/li.png" alt=""><span> @mglpartyplanner</span>
                </div>
                <div class="form-group">
                  <img class="img-fluid" src="img/wa.png" alt=""><span> 085 743 680 646</span>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection