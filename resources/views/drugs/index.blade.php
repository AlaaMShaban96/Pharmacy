@extends('layouts.app')

@section('content')
@php
    $searchFields = [
        ["name" => "atc","data-column" => 1, "title" => 'ACT','type'=>'text','value'=>request('atc')],
        ["name" => "code","data-column" => 1, "title" => 'Code','type'=>'text','value'=>request('code')],
        ["name" => "package","data-column" => 1, "title" => 'Package','type'=>'text','value'=>request('package')],
        ["name" => "name","data-column" => 1, "title" => 'Name','type'=>'text','value'=>request('name')],
        ["name" => "b_g","data-column" => 2, "title" => 'B/G','type'=>'text','value'=>request('b_g')],
        ["name" => "ingredients","data-column" => 3, "title" => 'Ingredients','type'=>'text','value'=>request('ingredients')],
        ["name" => "company_id","data-column" => 6, "title" =>"Company",'type'=>'select','collection'=>$companies,'property'=>'name','value'=>request("company_id")],
        ["name" => "drug_dosage_id","data-column" => 6, "title" =>"drug Dosage",'type'=>'select','collection'=>$drugDosages,'property'=>'name','value'=>request('drug_dosage_id')],
        ["name" => "currency_id","data-column" => 6, "title" =>"Currency",'type'=>'select','collection'=>$currencies,'property'=>'name','value'=>request("currency_id")],

    ];

@endphp






    <ol class="breadcrumb">
        <li class="breadcrumb-item">Drugs</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

             @include('flash::message')
            <div class="card mb-3">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    {!! Form::open(['route'=>['drugs.index'], 'method' => 'get']) !!}
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

             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Drugs
                             <a class="pull-right" href="{{ route('drugs.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('drugs.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

