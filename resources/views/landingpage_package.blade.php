@extends('layouts.app')
@section('header')
  <link rel="stylesheet" href="{{asset('asset/css/ionicons.min.css')}}">  
  <link rel="stylesheet" href="{{asset('asset/css/AdminLTE.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('asset/css/skins/_all-skins.min.css')}}">
@endsection
    @section('content')
     <section id="service">
      <div class="container">
        <p>
        <div class="row">          
          <div class="col-md-4 col-sm-6 portfolio-item">                     
          </div>
        </div>      
      </section>
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">Package</h2>
            <h3 class="section-subheading text-muted">This Package Include the Documentation (Photo and Video) </h3>
          </div>
        </div>
        <p>
        <div class="row">
          @foreach($listpackage as $data)
          <div class="col-md-4">          
           <div class="box">
            <div class="box-body no-padding">
              <table class="table table-striped text-center">
                <tr><img class="img-fluid" src="img/logo8.jpg" alt=""></tr>              
                <tr><td><h5>{{$data->name_package}}</h5></td></tr>
                <tr><td>{{$data->price}}</td></tr>           
                <tr><td>{{$data->kuota}} orang</td></tr> 
                <tr><td><b>Details Items : </b></td></tr>
                <center>                
                  @foreach($data->assets as $val)
                  <tr><td>{{$val->name_asset}}</td></tr>
                  @endforeach                                           
                <tr><td>
                  @if(!\Auth::check())
                       <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/login')}}">Order Package</a>
                  @else
                     <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/landingpage_formpackage',$data->id)}}">Order Package</a>
                @endif
                </td></tr>
              </table>
            </div>
          </div>           
        </div>
        @endforeach
      </div>   
    </section>
@endsection
  </body>
</html>
