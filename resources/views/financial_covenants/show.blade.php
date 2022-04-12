@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('financialCovenants.index') }}">Financial Covenant</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('financialCovenants.index') }}" class="btn btn-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('financial_covenants.show_fields')
                             </div>
                             <div class="card-body">

                                @include('outlays.table')
                                <div class="pull-right mr-3">

                                </div>
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
