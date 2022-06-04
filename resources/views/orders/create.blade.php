@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('orders.index') !!}">Order</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create Order</strong>
                            </div>
                            <div class="filter-container section-header-breadcrumb row justify-content-md-end pr-4 pt-2">
                                <a href="#" id="add-new-drug" class="btn btn-success">Add New </a>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'orders.store']) !!}

                                   @include('orders.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection

