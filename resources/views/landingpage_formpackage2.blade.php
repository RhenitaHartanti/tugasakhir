<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PPP | Reservation Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
 
  <link rel="stylesheet" href="{{('asset/bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
 
  <link rel="stylesheet" href="{{('asset/dist/css/AdminLTE.min.css')}}">
 
  
     <!-- Package -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">  
 
 <div class="register-box">
  <div class="register-logo">
    <h4><b>Form Resevation</b> | Precious Party Planner</h4>
  </div>
   <img class="img-fluid" src="img/logo8.jpg" alt="">
   <div class="register-box-body">
    <b><p class="login-box-msg">Choose special package (optional)</p></b>
     <form action="../../index.html" method="post">
     <div class="form-group has-feedback">
          <table>
            <thead>
               <tr>                               
                  <td> <img src="http://placehold.it/130x100" alt="..." class="margin"></td>
                  <td><img src="http://placehold.it/130x100" alt="..." class="margin"><br/></td>                                
               </tr>
               <tr>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Photo (+250k,2 jam)</center></td>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Video (+250k,60 second)</center></td>
               </tr>
               <tr>                               
                  <td> <img src="http://placehold.it/130x100" alt="..." class="margin"></td>
                  <td><img src="http://placehold.it/130x100" alt="..." class="margin"><br/></td>                                
               </tr>
               <tr>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Cake (85k, 16cm)</center></td>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Flower Bouquet (+10k, 1 rose)</center></td>
               </tr>
               <tr>                               
                  <td> <img src="http://placehold.it/130x100" alt="..." class="margin"></td>
                  <td><img src="http://placehold.it/130x100" alt="..." class="margin"><br/></td>                                
               </tr>
               <tr>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Flower Bouquet(60k, flower arrangements + 4 roses)</center></td>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Flower Bouquet(100k, flower arrangements + 10 roses)</center></td>
               </tr>
               <tr>                               
                  <td> <img src="http://placehold.it/130x100" alt="..." class="margin"></td>
                  <td><img src="http://placehold.it/130x100" alt="..." class="margin"><br/></td>                                
               </tr>
               <tr>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Flower Bouquet(155k, flower arrangements + 25 roses)</center></td>
               	  <td><center><input type="radio" name="jk" value="Perempuan"/>Snacks Bouquet(Price by Request)</center></td>
               </tr>                           
           </thead>
       </table>
       <p>
       <table>
              <tr>
                  <td><div class="col-xs-12" >
                  <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" style="background:#CCB20A" href="{{url('/dashboard')}}">Send</a>
                  </div></td>                  
              </tr> 
        </table> 
    </div>        
    </form>
 
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
</body>
</html>

    



   