<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PPP | Login Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{('dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
 
  <link rel="stylesheet" href="{{('dashboard/bower_components/Ionicons/css/ionicons.min.css')}}">
 
  <link rel="stylesheet" href="{{('dashboard/dist/css/AdminLTE.min.css')}}">

  </head>
  <body>
   <section class="bg-light" id="portfolio">
      <div class="container">
          <div class="row">
            <div class="login-box">
              <div class="login-logo">
               
                <img class="img-fluid" src="img/logo8.jpg" alt="">
              </div>

            <div class="login-box-body" style="background">
               <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                  @csrf
                      <div class="form-group row">                           
                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username" >
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>        
                      <div class="form-group row">                        
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>   
                      <center>             
                      <div class="form-group row>
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Login') }}
                                </button>                               
                            </div>
                      </div>
                      </center>  
                     <p class="login-box-msg">Dont have account ? <a href="{{url('/daftar')}}">Sign Up</a></p>    
          </form>
          </div>

      </div>
    </div>
  </div>
  </section>

    <!-- Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script src="{{('dashboard/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{('dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{('dashboard/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '50%' // optional
    });
  });
</script>

  </body>

</html>
