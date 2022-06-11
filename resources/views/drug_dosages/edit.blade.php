@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('drugDosages.index') !!}">@lang('app.Dosages')</a>
          </li>
          <li class="breadcrumb-item active">@lang('app.Edit') </li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('app.Edit')  Drug Dosage</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($drugDosage, ['route' => ['drugDosages.update', $drugDosage->id], 'method' => 'patch']) !!}

                              @include('drug_dosages.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
