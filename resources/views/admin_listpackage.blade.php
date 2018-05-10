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
              <center><h3 class="box-title">List Package</h3></center>
              <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Data Package</button><br>
            </div>
            <div class="box-body">              
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  <th><center>Id Package</center></th>
                  <th><center>Name Package</center></th>
                  <th><center>Details</center></th>
                  <th><center>Price</center></th>
                  <th><center>Quota (people)</center></th>
                  <th><center>List Asset</center></th>
                  <th><center>Settings</center></th>
                  </tr>
                </thead>                           
                	@foreach($packages as $value)
                <tr>                                  
                  <td><center>{{$value->id}}</center></td>
                  <td><center>{{$value->name_package}}</center></td>
                  <td><center>{{$value->details}}</center></td>            
                  <td><center>{{$value->price}}</center></td>
                  <td><center>{{$value->kuota}}</center></td>
                  <td><center>
                    @foreach($value->assets as $val)
                    <label>{{$val->name_asset}}</label><br>
                    @endforeach
                  </center></td>
                  <td><center>
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ubah{{$value->id}}"> <span class="glyphicon glyphicon-pencil"></span> </i>Edit</button>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus{{$value->id}}"> <span class="glyphicon glyphicon-trash"></span> </i>Delete</button></center>            
                  </td>
                </tr>
                <!-- MODAL EDIT -->
                <div id="modal-ubah{{$value->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit Data Package</h4></center>
                      </div>
                       <form action="{{route('package.update', [$value->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="modal-body">
                          <input type="hidden" name="id" class="ubah-id">
                          <br>
                            <div class="row">
                              <div class="form-group">
                                <label for="name_package" class="col-sm-3 control-label">Package Name</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="name_package" name="name_package" value="{{$value->name_package}}">
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
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="price" name="price" value="{{$value->price}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="kuota" class="col-sm-3 control-label">Kuota</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="kuota" name="kuota" value="{{$value->kuota}}">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="id_asset" class="col-sm-3 control-label">Asset</label>
                            <div class="col-sm-8">
                              <select class="form-control js-aset" name="id_asset[]" multiple="multiple">
                                  @foreach($assets as $value)
                                <option value="{{$value->id}}">{{$value->name_asset}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <br>
                      </div>
                      <div class="modal-footer">
                       <button type="submit" class="btn btn-success"> Save</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

                <!-- MODAL DELETE -->
                <div id="modal-hapus{{$value->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
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
                            <a class="btn btn-success" href="{{route('package.delete',[$value->id])}}">Yes</a>
                            <button data-dismiss="modal" class="btn btn-danger">No</button>
                        </div>
                    </div>
                  </div>
                </div>
                 @endforeach
                </tbody>                
              </table>

              <div id="modal-tambah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                      <h4 class="modal-title" id="myModalLabel"><center>Add Data Package</center></h4>
                  </div>
                     <form class="form-horizontal" action="{{url('admin_listpackage')}}" method="post">
                      {{csrf_field()}}
                      <div class="modal-body">
                        <br>
                          <div class="row">
                            <div class="form-group">
                              <label for="name_package" class="col-sm-3 control-label">Package Name</label>
                              <div class="col-sm-8">
                              <input type="text" class="form-control" id="name_package" name="name_package">
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
                        <div class="row">
                          <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="price" name="price">
                            </div>
                         </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="kuota" class="col-sm-3 control-label">Kuota</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="kuota" name="kuota">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="form-group">
                            <label for="id_asset" class="col-sm-3 control-label">Asset</label>
                            <div class="col-sm-9">
                              <select class="form-control js-aset" name="id_asset[]" multiple="multiple">
                                  @foreach($assets as $value)
                                <option value="{{$value->id}}">{{$value->name_asset}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <br>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success"> Save</button>
                </div>
            </form>
          </div>
        </div>
      </div> 
@endsection
@section('js')
<script type="text/javascript">
    $('.js-aset').select2();
</script>
@endsection