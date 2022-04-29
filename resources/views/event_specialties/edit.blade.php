@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('eventSpecialties.index') !!}">Event Specialty</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Event Specialty</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($eventSpecialty, ['route' => ['eventSpecialties.update', $eventSpecialty->id], 'method' => 'patch']) !!}

                              @include('event_specialties.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection