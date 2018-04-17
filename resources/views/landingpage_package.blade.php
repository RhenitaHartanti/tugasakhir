@extends('layouts.app')
    @section('content')

     <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Calendar Reservation</h2>
          </div>
        </div>
        <p>
        <div class="row">          
          <div class="col-md-4 col-sm-6 portfolio-item">
                     
          </div>
        </div>
          
            
    </section>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">Package</h2>
            <h3 class="section-subheading text-muted">We provide several package</h3>
          </div>
        </div>
        <p>
          <div class="row">
          <div class="col-md-4 col-md-4 col-md-4">
          @foreach($package as $key=>$data)
           <div class="box">
            <div class="box-body no-padding">
              <table class="table table-striped text-center">
                <tr><img class="img-fluid" src="img/logo8.jpg" alt=""></tr>                
                <tr><td>{{$data->package_name}}</td></tr>
                <tr><td>{{$data->price}}</td></tr>               
                <tr><td><label data-toggle="modal" data-target="#modal-tambah">See Details</label></td></tr>
                <tr><td><a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{url('/landingpage_formpackage')}}">Order Package</a></td></tr>

              @if(!\Auth::check())
              <a href="{{url('/landingpage_formpackage')}}"></a>
              @else
              <a href="{{url('/login')}}"></a>      
              @endif
          </table>
            </div>
          </div>
           @endforeach
          </div>
        </div>               
     </section>

@endsection
    <!-- Bootstrap core JavaScript -->
    </body>

</html>
