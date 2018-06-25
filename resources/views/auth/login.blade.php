@extends('layouts.app')
@section('content')
 <br>
    <br>
<div class="container" style="background-image:img/wa.jpg">
 <div class="row justify-content-center">
  <div class="col-md-8">
   <div class="login">
    <img class="img-fluid" src="img/logo17.jpg" alt="">
     <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
       @csrf
        <center> Enter your username and password. Don't have account ? <a href="{{url('/register')}}"> 
         <u>Register here</center></u></a><br>
         <div class="form-group row has-error">
           <label for="username" class="col-sm-4 col-form-label text-md-right">
             {{ __('Username') }}</label>
             <div class="col-md-6">
               <input id="username" type="text" class="form-control" name="username"
                value="{{ old('username') }}"
                @if ($errors->has('username')) style="border-color:#DF0101" @endif>
                 @if ($errors->has('username'))
                  <span class="help-block" style="color:#DF0101">
                     <strong>{{ $errors->first('username') }}</strong>
                  </span>
                  @endif
             </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">
             {{ __('Password') }}</label>
             <div class="col-md-6">
               <input id="password" type="password" class="form-control" name="password"
                @if ($errors->has('password')) style="border-color:#DF0101" @endif>
                @if ($errors->has('password'))
                 <span class="help-block" style="color:#DF0101">
                  <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
             </div>
            </div>                    
            <div class="col-md-12">
             <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
               <button type="submit" class="btn btn-primary">{{ __('Login') }}</button><br><br>
                 <a href="{{url('/forgetPassword')}}"><u>Forget your password ?</a>                               
              </div>
             </div>
            </div>
          </form>
         </div>
        </div>
       </div>
    </div>
   </div>
@endsection
@section('js')
<script type="text/javascript">
 $(document).ready(function(){
    @if ($errors->has('active'))
  swal({
  title: "Oopps Sorry",
  text: "You haven't done the registration confirmation. Please check your email",
  icon: "error",
  buttons: false,
  dangerMode: false,
})
 @endif
  
})
 
</script>
@endsection