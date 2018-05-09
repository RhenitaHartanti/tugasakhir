@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
  @if(session()->has('update'))
  <script>
    $().ready(function(e){
      swal({
        title:"Success",
        text:"Category Asset Success to Add",
        icon:"success",
        button:false,
        timer:2000
      });
    });
  @endif
  </script>
<section class="content-header">
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h3 class="box-title">List Categories</h3></center>
              <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Data Category</button><br>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><center>Id Category Asset</center></th>
                    <th><center>Name Category</center></th>
                    <th><center>Details</center></th>
                    <th><center>Settings</center></th>
                  </tr>
                </thead>                
                <tbody>
                  @foreach($categoryAsset as $value)
                <tr>                                
                  <td><center>{{$value->id}}</center></td>
                  <td><center>{{$value->name_category}}</center></td>
                  <td><center>{{$value->details}}</center></td>
                  <td><center>
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ubah{{$value->id}}"> <span class="glyphicon glyphicon-pencil"></span> </i>Edit</button>
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus{{$value->id}}"> <span class="glyphicon glyphicon-trash"></span> </i>Delete</button> 
                  </center></td>
                    </tr>
                    <div id="modal-ubah{{$value->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit Data Category</h4></center>
                      </div>
                       <form action="{{route('admin_categoryasset.update', [$value->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                        <br>
                        <div class="row">
                        <div class="form-group">          
                            <label for="name_category" class="col-sm-3 control-label">Name Category</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name_category" name="name_category" value="{{$value->name_category}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="details" class="col-sm-3 control-label">Details</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="details" name="details" value="{{$value->details}}">
                            </div>
                        </div>
                        </div>
                      </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success"> Save</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div> 

                <div id="modal-hapus{{$value->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                   <form method="POST" action="{{$value->id}}/delCategoryAsset">
                     {{csrf_field()}}
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete data package</h4>
                      </div>
                        <div class="modal-body">
                          <p>Are you sure to delete this data <span class="del-name" style="font-weight: bold;"></span> ?</p>                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-md btn-primary">Yes</button><br>
                          <button data-dismiss="modal" class="btn btn-danger">No</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>

               @endforeach
               </tbody>
             </table>
          </div>
          <div id="modal-tambah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel"><center>Add Data Category</center></h4>
            </div>
              <form action="{{url('admin_categoryasset')}}"  method="post" class="form-horizontal">
              {{csrf_field()}}
              <div class="modal-body">                
                        <div class="row">
                        <div class="form-group">          
                            <label for="name_category" class="col-sm-3 control-label">Name Category</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name_category" name="name_category">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="details" class="col-sm-3 control-label">Details</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="details" name="details">
                            </div>
                        </div>
                        </div>
                        <br>  
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"> Save</button>
          </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div> 
@endsection
@section('js')
@endsection