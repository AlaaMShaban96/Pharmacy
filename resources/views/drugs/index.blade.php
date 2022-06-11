@extends('layouts.app')

@section('content')
@php
    $searchFields = [
        ["name" => "atc","data-column" => 1, "title" => 'health.U_Code','type'=>'text','value'=>request('atc')],
        ["name" => "code","data-column" => 1, "title" => 'health.S_Code','type'=>'text','value'=>request('code')],
        // ["name" => "package","data-column" => 1, "title" => 'Package','type'=>'text','value'=>request('package')],
        ["name" => "name","data-column" => 1, "title" => 'health.Brand_Name','type'=>'text','value'=>request('name')],
        ["name" => "b_g","data-column" => 2, "title" => 'health.shelf_time','type'=>'text','value'=>request('b_g')],
        ["name" => "ingredients","data-column" => 3, "title" => 'health.Ingredients','type'=>'text','value'=>request('ingredients')],
        ["name" => "company_id","data-column" => 6, "title" =>"health.Agent",'type'=>'select','collection'=>$companies,'property'=>'name','value'=>request("company_id")],
        ["name" => "drug_dosage_id","data-column" => 6, "title" =>"health.Dosage",'type'=>'select','collection'=>$drugDosages,'property'=>'name','value'=>request('drug_dosage_id')],
        ["name" => "currency_id","data-column" => 6, "title" =>"health.Currency",'type'=>'select','collection'=>$currencies,'property'=>'name','value'=>request("currency_id")],
        ["name" => "package_id","data-column" => 6, "title" =>"health.Package",'type'=>'select','collection'=>$packages,'property'=>'name','value'=>request("package_id")],
        ["name" => "laboratory_id","data-column" => 6, "title" =>"health.Supplier",'type'=>'select','collection'=>$laboratories,'property'=>'name','value'=>request("laboratory_id")],

    ];

@endphp






    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('app.Drugs')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

             @include('flash::message')
            <div class="card mb-3">
                <h5 class="card-header">@lang('health.Search')</h5>
                <div class="card-body">
                    {!! Form::open(['route'=>['drugs.index'], 'method' => 'get']) !!}
                    <div class="form-row">
                        @foreach ($searchFields as $f)
                            <div class="col-md-3">
                                <label for="validationCustom{{$f['name']}}">@lang($f['title'])</label>
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
                             @lang('app.Drugs')
                             <a class="pull-right" href="{{ route('drugs.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body" style="overflow: scroll">
                             @include('drugs.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Currency price</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
                <ul class="list-group" id="list-price">
                  </ul>
            </div>

          </div>
        </div>
      </div>




@endsection
@push('scripts')
<script type="text/javascript">

    // $(document).ready(function () {
        $('#exampleModalCenter').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            console.log(button.data('x'));

            var recipient = button.data('x');// Extract info from data-* attributes
            // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            $("#list-price").empty()
            $("#list-price").append(recipient);
        })
// });
</script>
@endpush

