<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Precious Party Planner</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/agency.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/sweetalert/sweetalert.css')}}">
    @yield('header')
  </head>
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Precious Party Planner</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/landingpage_beranda')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/landingpage_package')}}">Order Package</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/landingpage_galeri')}}">Gallery</a>
            </li>           
              @if(!\Auth::check())

            <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
              @else
              <!-- ini buat setting -->
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{url('/landingpage_setting')}}">{{ __('List Order') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{url('/landingpage_profil')}}">{{ __('Profil') }}</a>
              </li>
             <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <!-- <a href="">{{Auth::user()->name}}</a> -->{{ __('Logout') }}
                                                      </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>                 
              @endif                                    
          </ul>
        </div>
      </div>
    </nav>
 @yield('content')
 <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="copyright">Copyright &copy; Precious Party Planner 2018</span>
          </div>          
       </div>
     </div>
  </footer>
  @yield('js')
<script src="{{('vendor/sweetalert/sweetalert.min.js')}}"></script>
 @include('sweet::alert')
</body>
</html>

