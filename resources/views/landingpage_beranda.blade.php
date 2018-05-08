@extends('layouts.app')
@section('header')
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
        <div class="col-md-6">       
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4598809275953!2d110.19219281450171!3d-7.5247129945728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8efa2c540f3b%3A0x1b00c6767784339b!2sPerumahan+Bagongan+Asri!5e0!3m2!1sid!2sid!4v1524232016733" width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>     
        </div>
    </div>
  </div>
</section>
@endsection
@section('js')
@endsection