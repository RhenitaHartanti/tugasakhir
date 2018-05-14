@extends('layouts.layoutadmin')
@section('header')
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <section class="content">    
      <div class="row">
        @foreach($admin as $key=>$data)  
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4><center>Data Profil Admin</center></h4> 
              <div class="row">                 
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">ID Admin</label>
                      <div class="col-sm-8">
                          {{$data->id}}
                       </div>
                </div>
              </div>
                <p>
              <div class="row">                 
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-8">
                          {{$data->name}}
                       </div>
                </div>
              </div>
                <p>
              <div class="row">
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                      <div class="col-sm-8">
                           {{$data->username}}
                      </div>
                </div>
              </div>
              <p>
              <div class="row">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-8">
                          {{$data->email}}
                      </div>
                </div>
              </div>
              <p>
                <div class="row">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">No Hp</label>
                      <div class="col-sm-8">
                           {{$data->nohp}}
                      </div>
                </div>
              </div>
              <p>
              <div class="row">
                <div class="modal-footer">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ubah{{$data->id}}"> <span class="glyphicon glyphicon-pencil"></span> Edit Data</button>
                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-ubahpassword{{$data->id}}"> <span class="glyphicon glyphicon-lock"></span> Change Password</button>
                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-ubahpassword{{$data->id}}"> <span class="glyphicon glyphicon-lock"></span> Reset Password</button>                       
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="row">
      <div class="col-xs-12">
       <div class="box-header">
        <div class="row"><center><h3 class="box-title">Graphic Order</h3></center>       
          <div class="box-body">
            <div class="col-md-12">
              <div class="box-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>                 
              <center><h3 class="box-title">History Order</h3></center>   
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>                  
                  <th><center>Id Order</center></th>
                  <th><center>Username</center></th>
                  <th><center>Name Package</center></th>
                  <th><center>Using Date</center></th>
                  <th><center>Using Time</center></th>
                  <th><center>Detail Order</center></th>
                  </tr>
                </thead>
                <tbody>                  
                <tr>                   
                  <td><center></center></td>
                  <td><center></center></td>
                  <td><center></center></td>
                  <td><center></center></td>
                  <td><center></center></td>
                  <td><center></center></td>                       
                </tr>                
                </tbody>
              </table>       
              </div>
            </div>
          </div>
        </div>
      </div> 
</section>
</section>
</div>

 <div id="modal-ubah{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit Data Admin</h4></center>
                      </div>
                       <form action="{{route('admin.update', [$data->id]) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                        <input type="hidden" name="id" class="ubah-id">
                         <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
                            </div>
                        </div>
                        </div>
                        <br>
                         <div class="row">
                        <div class="form-group">
                            <label for="nohp" class="col-sm-3 control-label">No Hp</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nohp" name="nohp" value="{{$data->nohp}}">
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

        <div id="modal-ubahpassword{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <center><h4 class="modal-title" id="myModalLabel">Change Password</h4></center>
                      </div>
                       <form action="{{route('changePassword',$data->id) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="modal-body">
                       <div class="row">
                        <div class="form-group">
                            <label for="lastpassword" class="col-sm-4 control-label">Last Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" id="lastpassword" name="passLama" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="newpassword1" class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" id="newpassword1" name="passBaru" required="">
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="form-group">
                            <label for="newpassword2" class="col-sm-4 control-label">Confirm New Password</label>
                            <div class="col-sm-7">
                              <input type="password" class="form-control" id="newpassword2" name="confirmPass" required="">
                            </div>
                        </div>
                        </div>
                      </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-success"> Save Password</button>
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
    </section>
      </div>
    </section>
  </section>
</div>
@endsection
@section('js')
<script src="{{('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{('asset/bower_components/select2/dist/js/select2.min.js')}}"></script>
<script src="{{('asset/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{('asset/bower_components/Chart.js/Chart.js')}}"></script>
<script src="{{('asset/dist/js/adminlte.min.js')}}"></script>
<script src="{{('asset/dist/js/demo.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
  })
</script>
@endsection