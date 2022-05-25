
<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Receipts #
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-2">name</th>
                    <th class="col-2">company_id</th>
                    <th class="col-2">validity</th>
                    <th class="col-2">store_id</th>
                    <th class="col-2">quantity</th>
                    <th class="col-2">price</th>

                    <th class="col-2">Action</th>

                  </tr>
                </thead>
                <tbody id="invoice-body">
                    @foreach ($sampleReceiveds as $key=> $sampleReceived)
                        <tr>
                            <th class='col-2'  scope='row'>{{$key}}</th>
                            <td class='col-2' >{{$sampleReceived->drug->name}}</td>
                            <td class='col-2' >{{$sampleReceived->company->name}}</td>
                            <td class='col-2' >{{$sampleReceived->validity->format('Y-m-d H:m')}}</td>
                            <td class='col-2' >{{$sampleReceived->store?$sampleReceived->store->name:''}}</td>
                            <td class='col-2' >{{$sampleReceived->quantity}}</td>
                            <td class='col-2' >{{$sampleReceived->price}}</td>
                            <td class='col-2' >
                                {!! Form::open(['route' => ['sampleReceiveds.destroy', $sampleReceived->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>

                                        <a href="{{ route('sampleReceiveds.edit', $sampleReceived->id) }}" class='btn btn-ghost-info'>
                                            <i class="fa fa-edit"></i>
                                            </a>
                                        {!! Form::button('<i class="fa fa-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-ghost-danger',
                                                'onclick' => "return confirm('Are you sure?')"
                                            ]) !!}
                                </div>
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
