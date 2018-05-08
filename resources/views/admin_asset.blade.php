@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">         
    <section class="content">
    	<p>
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>List Assets</center></h4>
              <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Data Asset</button>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover"> 
                <thead>              
                 <tr>                  
                  <th><center>Id Asset</center></th>
                  <th><center>Name Category</center></th>                  
                  <th><center>Name Asset</center></th>
                  <th><center>Price</center></th>                  
                  <th><center>Details</center></th>
                  <th><center>Settings</center></th>
                 </tr>
                </thead>                
              <tbody>
                @foreach($assets as $value)
                <tr>                                
                  <td><center>{{$value->id}}</center></td>
                  <td><center>{{$value->name_category}}</center></td>                  
                  <td><center>{{$value->name_asset}}</center></td>
                  <td><center>{{$value->price}}</center></td>
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
                        <center><h4 class="modal-title" id="myModalLabel">Edit Data Asset</h4></center>
                      </div>
                       <form action="{{route('admin_asset.update', [$value->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                        <br>               
                        <div class="row">
                        <div class="form-group">          
                            <label for="name_asset" class="col-sm-4 control-label">Name Asset</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="name_asset" name="name_asset" value="{{$value->name_asset}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Price</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="price" name="price" value="{{$value->price}}">
                            </div>
                        </div>
                        </div>
                        <br>                        
                        <div class="row">
                        <div class="form-group">
                            <label for="details" class="col-sm-4 control-label">Details</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="details" name="details" value="{{$value->details}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">          
                            <label for="id_category_asset" class="col-sm-4 control-label">Category Asset</label>
                            <div class="col-sm-7">
                              <select class="form-control" name="id_category_asset">
                                <option value="" disabled selected>Select Category Asset</option>
                                  @foreach($category_assets as $value1)
                                <option <?php if($value1->name_category==$value->name_category){echo "selected='true'";}?> value="{{$value1->id}}">{{$value1->name_category}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        </div> 
                        <br>
                        <br>
                    <div class="modal-footer">
                      <center><button type="submit" class="btn btn-success">Save</button></center>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>                 

                <div id="modal-hapus{{$value->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete data package</h4>
                      </div>
                       <form action="{{url('admin_asset')}}"  method="post" class="form-horizontal">
                       {{csrf_field()}}
                         <div class="modal-body">
                          <p>Are you sure to delete this data <span class="del-name" style="font-weight: bold;"></span> ?</p>                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-md btn-success"></i> Yes</button>
                            <button data-dismiss="modal" class="btn btn-danger">No</button>
                        </div>
                      </form>
                    </div>
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
              <h4 class="modal-title" id="myModalLabel"><center>Add Data Asset</center></h4>
            </div>
              <form action="{{url('admin_asset')}}"  method="post" class="form-horizontal">
              {{csrf_field()}}
              <div class="modal-body">                                 
                        <div class="row">
                        <div class="form-group">          
                            <label for="name_asset" class="col-sm-4 control-label">Name Asset</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="name_asset" name="name_asset">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Price</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                            <label for="details" class="col-sm-4 control-label">Details</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="details" name="details">
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group">          
                            <label for="id_category_asset" class="col-sm-4 control-label">Category Asset</label>
                            <div class="col-sm-7">
                              <select class="form-control" name="id_category_asset">
                                <option value="" disabled selected>Select Category Asset</option>
                                  @foreach($category_assets as $value)
                                <option value="{{$value->id}}">{{$value->name_category}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        </div>     
                        </div>
                       </div>
          <div class="modal-footer">
            <center><button type="submit" class="btn btn-success"> Add</button></center>
          </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
          </div>
</section>
</div>
</section>
@endsection
@section('js')
@endsection