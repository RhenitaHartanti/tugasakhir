@extends('layouts.app')
  <title>PPP | Reservation Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!--  <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
 
  <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
 
  <link rel="stylesheet" href="{{('asset/dist/css/AdminLTE.min.css')}}">
 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
@section('content')
<body class="hold-transition register-page" bgcolor="#ffffff">  
 
 <div class="register-box">
  <div class="register-logo">

    <h5><b>Form Resevation</b> | Precious Party Planner</h5>
  </div>
   <img class="img-fluid" src="img/logo8.jpg" alt="">
  <div class="register-box-body">
    <b><p class="login-box-msg">Please input your data properly</p></b>

    <form action="../../index.html" method="post">
     
      <label>Order Date</label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control">
      </div>
         <label>Using Date</label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control">
      </div>
       <label>Using Time</label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control">
      </div>
       <label>Name</label>
      <div class="form-group has-feedback">
        <input type="email" class="form-control">
      </div>
       <label>Greeting</label>
      <div class="form-group has-feedback">
        <input type="email" class="form-control">
      </div>
       <label>Theme (Color and Custom Caracter)</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control">
      </div>
       <label>Place</label>
      <div class="form-group">
        <textarea class="form-control" rows="4"></textarea>
      </div>
       <label>Total Guests</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control">
      </div>
      <div class="form-group">
        <label>Select Additional Package</label>
          <select class="form-control">
            <option>Photo (2 hours, +Rp 250.000)</option>
            <option>Video (60 seconds, +Rp 250.000)</option>
            <option>Cake (diameter 18cm, +Rp 85.000)</option>
            <option>Photo (2 hours, + Rp 250.000)</option>
            <option>Flower Bouquet (flowers + 1 rose, +Rp 10.000)</option>
            <option>Flower Bouquet (flowers + 4 rose, +Rp 60.000)</option>
            <option>Flower Bouquet (flowers + 10 rose, +Rp 100.000)</option>
            <option>Flower Bouquet (flowers + 25 rose, +Rp 155.000)</option>
            <option>Snacks Bouquet (price by request)</option>
          </select>
      </div>
      <label>Note</label>
      <div class="form-group">
        <textarea class="form-control" rows="6"></textarea>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" style="background:#CCB20A" href="{{url('/setting')}}">Send</a>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
   </div>
  <!-- /.form-box -->
</div>
 
    <!-- Bootstrap core JavaScript -->
    <script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{('asset/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection
</body>
</html>

    
