@extends('layouts.app')

@section('content')
@php
    $searchFields = [
        // ["name" => "status","data-column" => 1, "title" => 'Status','type'=>'text','value'=>request('status')],
        ["name" => "status","data-column" => 6, "title" =>"Status",'type'=>'select','collection'=>['pending', 'canceled', 'approve', 'receive'],'property'=>'name','value'=>request("status")],
        ["name" => "from","data-column" => 1, "title" => 'From ','type'=>'date','value'=>request('from')],
        ["name" => "to","data-column" => 1, "title" => 'To','type'=>'date','value'=>request('to')],
    ];

@endphp
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Order Search</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

             @include('flash::message')
            <div class="card mb-3">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    {!! Form::open(['route'=>['orders.index'], 'method' => 'get']) !!}
                    <div class="form-row">
                        @foreach ($searchFields as $f)
                            <div class="col-md-3">
                                <label for="validationCustom{{$f['name']}}">{{ $f['title'] }}</label>
                                @if ($f['type']=='select')
                                {{-- {{dd($f)}} --}}
                                    <select name="{{$f['name']}}" value="{{$f['value']}}" class="form-control searchDTFields" data-column="{{ $f['data-column'] }}" id="validationCustom{{$f['name']}}">
                                        <option value="" > select </option>
                                        @foreach ($f['collection'] as $value)
                                            <option  value="{{ $value }}" {{request($f['name'])==($value)?'selected':'' }}>{{$value}}</option>
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
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Orders</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Orders
                             {{-- @can('orders.create') --}}
                                <a class="pull-right" href="{{ route('orders.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                             {{-- @endcan --}}
                         </div>
                         <div class="card-body">
                             @include('orders.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

