@extends('layouts.app')
@section('header')
@endsection
@section('content')
   <section class="order">
     <div class="col-lg-6"> 
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Order</h2>
        </div>
    <br>
    <table class="table table-striped"> 
         @foreach($customer as $value)
        <tr>
          <td>Name</td>
          <td>{{$value->theme}}</td>
        </tr>
        <tr>
          <td>Username</td>
          <td></td>
        </tr>
        <tr>
          <td>Email</td>
          <td></td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td></td>
        </tr>
        @endforeach
     </table>  
   </div>
</section>                    
      
@endsection
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script type='text/javascript'>  
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
  </script>
  <script type="text/javascript">
  function detailOrder(dom) {
    var date_using = $(dom).data('date_using');
    var time_using = $(dom).data('time_using'); 
    var time_finish = $(dom).data('time_finish');  
    var theme = $(dom).data('theme');
    var place = $(dom).data('place');
    var guest = $(dom).data('guest');
    var greeting = $(dom).data('greeting');
    var note = $(dom).data('note');
    $('#date_using').val(date_using)
    $('#time_using').val(time_using) 
    $('#time_finish').val(time_finish)
    $('#theme').val(theme)
    $('#place').val(place)
    $('#guest').val(guest)
    $('#greet').val(greeting)
    $('#note').val(note)
    $('#modal-lihat').modal('show')
  }
  </script>
</body>
</html>
