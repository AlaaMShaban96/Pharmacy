@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('drugs.index') }}">@lang('app.Drugs')</a>
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
                                  <a href="{{ route('drugs.index') }}" class="btn btn-light">@lang('app.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('drugs.show_fields')
                             </div>
                             <h3>@lang('health.Drugs_With_Same_Ingredients') </h3>
                             <div class="card-body" style="overflow: scroll">
                                @include('drugs.table')

                            </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        console.log('G4545');
        // $('#drugsviewdatatable-table').dataTable( {
        //     "scrollX": true
        // } );
    } );
</script>
@endpush
