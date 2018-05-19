@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login">
                <img class="img-fluid" src="img/logo17.jpg" alt="">
                  <div class="card-body">
                    <form method="POST" action="/resetPassword">
                        @csrf
                        <p>
                         <center> Enter your email here . . .</center></u></a>
                         <p>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <!--  <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <p>
                            <p>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                               <center> <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button></center>
                                <p>
                                
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