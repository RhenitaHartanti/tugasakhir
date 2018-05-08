@extends('layouts.app')
@section('header')
@endsection
@section('content')
	<div class="formorder"> 
		 <form enctype="multipart/form-data" method="POST" action="/uploadBukti" role="form">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="id_order" class="col-sm-12 control-label">Booking Code</label>
                  <div class="col-sm-12">
                    <input type="id_order" class="form-control" id="booking_code" name="booking_code">
                  </div>
                </div>
                <div class="form-group">
                  <label for="attach" class="col-sm-12 control-label">Attach File</label>
                  <div class="col-sm-12">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                  </div>
                </div>   
             <input type="hidden" value="{{$id}}" name="id_order">


              </div>
              <div class="box-footer">
                <center>
                  <center><button class="btn btn-sm btn-success" type="submit" class="close" data-dismiss="modal"><span aria-hidden="true">OK</span></button></center>
              </center>
              </div>
            </form>
	</div>
@endsection
@section('js')
@endsection