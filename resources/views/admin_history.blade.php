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
            </div>
            <div class="row"><center><h3 class="box-title">Grafik Order</h3></center>         
              <div class="box-body">
                <section class="content">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">              
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="chart">
                          <canvas id="areaChart" style="height:250px"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>  
                    <center><h3 class="box-title">History Order</h3></center>          
              </div>
            </div>
  </section>
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