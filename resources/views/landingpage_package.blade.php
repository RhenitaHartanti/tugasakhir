@extends('layouts.app')
@section('header')
@endsection
@section('content')
    <br>
    <br>
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">Package Event</h2>
            <h3 class="section-subheading text-muted">This Package Include the Documentation (Photo and Video) </h3>
          </div>
        </div>
        <div class="row">
          @foreach($listpackage as $data)
          <div class="col-md-4">
          <img class="img-fluid" src="img/logo8.jpg" alt="">           
            <div class="package">
                <center>
                <h3 class="section-subheading text-muted" style="font-size: 20px">             
                  {{$data->name_package}}<br><br>
                  Rp. {{number_format($data->price,2,',','.')}}<br>  
                </h3>
                <h3 class="section-subheading text-muted" style="font-size: 15px">    
                  <b>for {{$data->kuota}} people</b><br>                   
                </h3><hr>
                <h3 class="section-subheading text-muted" style="font-size: 15px">
                  Details Items :<br><br>
                  @foreach($data->assets as $val)
                  {{$val->name_asset}}<br><br>
                  @endforeach
                </h3>               
                  @if(!\Auth::check())
                    <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/login')}}" style="background:#B8860B">Order Package</a>
                  @else
                    <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/landingpage_formpackage',$data->id)}}" style="background:#B8860B; color:#ffffff;">Order Package</a>
                  @endif                  
                </center>
                <br>
            </div> 

        </div>
        @endforeach
        <div class="col-md-4">
          <img class="img-fluid" src="img/logo8.jpg" alt="">           
            <div class="package">
                <center><br>
                <h3 class="section-subheading text-muted" style="font-size: 30px">             
                  Custom Package<br><br>
                </h3>
               <h3 class="section-subheading text-muted" style="font-size: 20px">             
                  Start from Rp 1.000.000,00<br><br>
                </h3>
                <h3 class="section-subheading text-muted" style="font-size: 15px">    
                  <b>custom your package order based on your need</b><br>                   
                </h3>               
                  @if(!\Auth::check())
                    <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/login')}}">Order Package</a>
                  @else
                    <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/landingpage_formpackagecustom')}}" style="background:#B8860B">Order Package</a>
                  @endif                  
                </center>
                <br>
            </div> 
                      
        </div>

      </div>
              <br>   
    </section>
@endsection
  </body>
</html>
