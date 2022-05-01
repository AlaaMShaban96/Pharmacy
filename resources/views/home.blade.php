@extends('layouts.app')

@section('content')
  <div class="container-fluid">
        <div class="animated fadeIn mt-5">
             <div class="row">
                <!-- Small boxes (Stat box) -->
                    <div class="col-3">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>12</h3>

                                <p>dashboard_total_orders</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">dashboard_more_info
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-3">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                    <h3>11DL</h3>


                                <p>dashboard_total<span style="font-size: 11px">dashboard_after </span></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <a href="#" class="small-box-footer">dashboard_more_info
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>11</h3>
                                <p>restaurant_plural</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cutlery"></i>
                            </div>
                            <a href="#" class="small-box-footer">dashboard_more_info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-3">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>5</h3>

                                <p>dashboard_total_clients</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-group"></i>
                            </div>
                            <a href="#" class="small-box-footer">dashboard_more_info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

            </div>

        </div>
    </div>
</div>
@endsection
