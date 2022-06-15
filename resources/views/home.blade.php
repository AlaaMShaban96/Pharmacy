@extends('layouts.app')

@section('content')
  <div class="container-fluid">
        <div class="animated fadeIn mt-5">
             <div class="row">
                {{-- <!-- Small boxes (Stat box) -->
                    <div class="col-3">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>12</h3>

                                <p>Repository</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon icon-social-dropbox"></i>
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


                                <p>Samples</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon icon-chemistry"></i>
                            </div>
                            <a href="#" class="small-box-footer">dashboard_more_info
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}
                    <!-- ./col -->
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$eventRepository->count()}}</h3>
                                <p>Events</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon icon-badge  "></i>
                            </div>
                            <a href="#" class="small-box-footer">show <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$financialCovenantRepository->count()}}</h3>

                                <p>Pocket money </p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon icon-wallet "></i>
                            </div>
                            <a href="#" class="small-box-footer">show <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

            </div>

        </div>
    </div>
</div>
@endsection
