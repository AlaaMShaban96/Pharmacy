@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('orderRequests.index') }}">Order Request</a>
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
                                  <a href="{{ route('orderRequests.index') }}" class="btn btn-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('order_requests.show_fields')
                                 <div id="accordion">
                                    <div class="card">
                                      <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Orders #
                                          </button>
                                        </h5>
                                      </div>

                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-striped">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">drug</th>
                                                    <th scope="col">quantity</th>
                                                    <th scope="col">For</th>
                                                  </tr>
                                                </thead>
                                                <tbody id="invoice-body">
                                                    @foreach ($orderRequest->orders as $key=> $order)
                                                        <tr>
                                                            <td class='col-6' >{{$order->drug->name}}</td>
                                                            <td class='col-3' >{{$order->quantity}}</td>
                                                            <td class='col-3' >{{$order->for}}</td>
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
