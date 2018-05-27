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
              <center><h3>LIST CUSTOMERS</h3></center>
              <br>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><center>Id Customer</center></th>
                    <th><center>Level</center></th>
                    <th><center>Name</center></th>
                    <th><center>Username</center></th>
                    <th><center>Email</center></th>
                    <th><center>No HP</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($customer as $key=>$data)
                    @php
                      $pnjg = strlen($data->id);
                      if($pnjg==1){
                        $id = 'CST00'.$data->id;
                      }elseif($pnjg==2){
                        $id = 'CST0'.$data->id;
                      }else{
                        $id = 'CST'.$data->id;
                      }
                    @endphp
                    <tr>                                  
                      <td><center>{{$id}}</center></td>
                      <td><center>{{$data->level}}</center></td>
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