@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('companies.index',['type'=>$company->type]) }}">@lang('companies.Company')</a>
            </li>
            <li class="breadcrumb-item active">@lang('app.Detail')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('app.Detail')</strong>
                                  <a href="{{ route('companies.index') }}" class="btn btn-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('companies.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
