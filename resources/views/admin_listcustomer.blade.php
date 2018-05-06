@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id Customer</th>
                    <th>Level</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No HP</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($customer as $key=>$data)
                    <tr>                                  
                      <td><center>{{$data->id}}</center></td>
                      <td>{{$data->level}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->username}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->nohp}}</td>
                    </tr>   
                    @endforeach
                  </tbody>                           
              </table>
             </div>
          </div>
        </div>
      </div> 
 </section>
</section>
</div>
@endsection
@section('js')
@endsection