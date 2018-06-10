@extends('layouts.app')
@section('header')
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="login">
		    <form enctype="multipart/form-data" method="POST" action="" role="form">
          {{ csrf_field() }}
              <div class="box-body">
                <br>
                <center><h4><b>Tagihan Pembayaran</b></h4></center>
                <div class="form-group">
                  <br>
                  <label for="id_order" class="col-sm-12 control-label">Halooooo</label>                  
                </div>   
              </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-primary"><a href="{{URL::to('landingpage_formbayar/'.$value->id)}}">confirmation</a></button></center>
              </center>
              </div>
            </form>
	      </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
@endsection