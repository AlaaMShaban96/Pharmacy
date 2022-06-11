@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('drugs.index') !!}">Drug</a>
          </li>
          <li class="breadcrumb-item active">@lang('app.Edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('app.Edit') @lang('app.Drugs') </strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($drug, ['route' => ['drugs.update', $drug->id], 'method' => 'patch']) !!}

                              @include('drugs.fields')

                              {!! Form::close() !!}
                              <div id="accordion">
                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        @lang('health.Invoices') #
                                      </button>
                                    </h5>
                                  </div>

                                  <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th class="col-2">#</th>
                                                <th class="col-2">company</th>
                                                <th class="col-2">currency</th>
                                                <th class="col-2">price</th>
                                                <th class="col-2">date</th>
                                                <th class="col-2">Action</th>

                                              </tr>
                                            </thead>
                                            <tbody id="invoice-body">
                                                @foreach ($invoices as $key=> $invoice)
                                                    <tr>
                                                        <th class='col-2'  scope='row'>{{$key}}</th>
                                                        <td class='col-2' >{{$invoice->company->name}}</td>
                                                        <td class='col-2' >{{$invoice->currency->name}}</td>
                                                        <td class='col-2' >{{$invoice->price}}</td>
                                                        <td class='col-2' >{{$invoice->createdAtDiff}}</td>
                                                        <td class='col-2' >
                                                            {!! Form::open(['route' => ['invoices.destroy', $invoice->id], 'method' => 'delete']) !!}

                                                                {!! Form::button('<i class="fa fa-trash"></i>', [
                                                                    'type' => 'submit',
                                                                    'class' => 'btn btn-ghost-danger delete-confirm',
                                                                    //'onclick' => "return confirm('Are you sure?')"
                                                                ]) !!}
                                                            {!! Form::close() !!}

                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                  </div>
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>

@endsection
