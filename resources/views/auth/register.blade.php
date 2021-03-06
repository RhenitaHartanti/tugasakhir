@extends('layouts.app')
<br>
<br>
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
   <div class="register">
    <img class="img-fluid" src="img/logo17.jpg" alt="">
     <div class="card-body">
      <center><b>Please input your data properly</b><br></center>
      <form method="POST" action="{{ route('register') }}">
       @csrf
       <br>
        <div class="form-group row">
         <label for="name" class="col-md-4 col-form-label text-md-right">
          {{ __('Name') }}</label>
          <div class="col-md-6">
           <input id="name" type="text" class="form-control{{ $errors->
           has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
           @if ($errors->has('name')) style="border-color:#DF0101" @endif>
             @if ($errors->has('name'))
              <span class="invalid-feedback">
               <strong>{{ $errors->first('name') }}</strong>
              </span>
             @endif
           </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">
            {{ __('Username') }}</label>
             <div class="col-md-6">
              <input id="username" type="text" class="form-control{{ $errors->
              has('username') ? ' is-invalid' : '' }}" name="username"
              value="{{ old('username') }}" @if ($errors->has('username'))
               style="border-color:#DF0101" @endif>
                @if ($errors->has('username'))
                 <span class="invalid-feedback">
                  <strong>{{ $errors->first('username') }}</strong>
                 </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
             <label for="email" class="col-md-4 col-form-label text-md-right">
             {{ __('E-Mail') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors
                 ->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                  @if ($errors->has('email')) style="border-color:#DF0101" @endif>
                   @if ($errors->has('email'))
                    <span class="invalid-feedback">
                     <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
              <label for="nohp" class="col-md-4 col-form-label text-md-right">
               {{ __('No Handphone') }}</label>
                <div class="col-md-6">
                 <input id="nohp" type="number" class="form-control{{ $errors->has('nohp')
                  ? ' is-invalid' : '' }}" name="nohp" value="{{ old('nohp') }}"
                  @if ($errors->has('nohp')) style="border-color:#DF0101" @endif>
                    @if ($errors->has('nohp'))
                     <span class="invalid-feedback">
                       <strong>{{ $errors->first('nohp') }}</strong>
                     </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">
               {{ __('Password') }}</label>
                <div class="col-md-6">
                 <input id="password" type="password" class="form-control{{ $errors->has('password')
                  ? ' is-invalid' : '' }}" name="password" @if ($errors->has('password'))
                  style="border-color:#DF0101" @endif>
                   @if ($errors->has('password'))
                    <span class="invalid-feedback">
                     <strong>{{ $errors->first('password') }}</strong>
                    </span>
                   @endif
                   </div>
                </div>
                <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                  {{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" @if ($errors->has('password_confirmation'))
                        style="border-color:#DF0101" @endif>
                    </div>
                </div>
                <center>after register, you must check your email to activated your account</center><br>
                <div class="form-group row mb-0">
                 <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary save">
                   {{ __('Register') }}
                  </button>
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
<!-- <script type="text/javascript">
  $('.save').on("click",function(register){
    swal({
  title: "Registered Success",
  text: "Your Data is Saved",
  icon: "success",
  buttons: false,
  dangerMode: true,
})
  });
</script> -->
@endsection
