@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{ucfirst(request('type'))}}</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             {{ucfirst(request('type'))}}
                             <a class="pull-right" href="{{ route('receives.create',['type'=>request('type')]) }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body" style="overflow: scroll">
                             @include('receives.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

