@extends('layouts.app')

@section('content')
@php
    $searchFields = [
        ["name" => "code","data-column" => 1, "title" => 'Code','type'=>'text','value'=>request('code')],
        ["name" => "from","data-column" => 1, "title" => 'From ','type'=>'date','value'=>request('from')],
        ["name" => "to","data-column" => 1, "title" => 'To','type'=>'date','value'=>request('to')],
    ];

@endphp
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Sample Receiveds</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

             @include('flash::message')
            <div class="card mb-3">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    {!! Form::open(['route'=>['sampleReceiveds.index'], 'method' => 'get']) !!}
                    <div class="form-row">
                        @foreach ($searchFields as $f)
                            <div class="col-md-3">
                                <label for="validationCustom{{$f['name']}}">{{ $f['title'] }}</label>
                                @if ($f['type']=='select')
                                    <select name="{{$f['name']}}" value="{{$f['value']}}" class="form-control searchDTFields" data-column="{{ $f['data-column'] }}" id="validationCustom{{$f['name']}}">
                                        <option value="" > select </option>
                                        @foreach ($f['collection'] as $value)
                                            <option  value="{{ ($value)->id }}" {{request($f['name'])==($value)->id?'selected':'' }}>{{($value)->{$f['property']} }}</option>
                                        @endforeach
                                    </select>
                                @else
                                <input name="{{$f['name']}}" type="{{$f['type']}}" value="{{$f['value']}}" class="form-control searchDTFields" data-column="{{ $f['data-column'] }}" id="validationCustom{{$f['name']}}">
                                @endif
                            </div>
                        @endforeach
                        <div class="col-auto align-self-end">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
         </div>
    </div>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             SampleReceiveds
                             <a class="pull-right" href="{{ route('sampleReceiveds.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('sample_receiveds.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

