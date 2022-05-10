<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $eventMaterial->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $eventMaterial->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $eventMaterial->updated_at }}</p>
</div>

<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Invoices #
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- event Materials Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('user_id', 'Company:') !!}
                        {!! Form::select('company_id',$companies, null, ['class' => 'form-control','id'=>'company_id']) !!}
                    </div>
                     <!-- currency_id Field -->
                     <div class="form-group col-sm-4">
                        {!! Form::label('currency_id', 'Currency:') !!}
                        {!! Form::select('currency_id',$currencies, null, ['class' => 'form-control','id'=>'currency_id']) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {!! Form::label('medical_representative', 'Price :') !!}
                        {!! Form::number('price', null, ['class' => 'form-control','id'=>'price']) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {!! Form::label('medical_representative', 'Count :') !!}
                        {!! Form::number('count', null, ['class' => 'form-control','id'=>'count']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <button id="add-invoice" type="button" class="btn btn-success ">Add</button>

                    </div>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-2">company</th>
                    <th class="col-2">currency</th>
                    <th class="col-2">price</th>
                    <th class="col-2">count</th>
                    <th class="col-2">date</th>
                    <th class="col-2">Action</th>
                  </tr>
                </thead>
                <tbody id="invoice-body">
                    @foreach ($eventMaterial->invoices as $key=> $invoice)
                        <tr>
                            <th class='col-2'  scope='row'>{{$key}}</th>
                            <td class='col-2' >{{$invoice->company->name}}</td>
                            <td class='col-2' >{{$invoice->currency->name}}</td>
                            <td class='col-2' >{{$invoice->price}}</td>
                            <td class='col-2' >{{$invoice->count}}</td>
                            <td class='col-2' >{{$invoice->createdAtDiff}}</td>
                            <td class='col-2' ><button onclick="onDelete({{$invoice->id}})" type='button' class='btn btn-danger'>Delete</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
      </div>
    </div>

</div>
@push('scripts')
<script type="text/javascript">
        var add_invoice_materials_url=@json(route('addInvoice'));
        var remove_invoice_materials_url=@json(route('removeInvoice'));

        var event_material_id =@json($eventMaterial->id);
        $('#add-invoice').on('click', function(){
            var company_id = $('#company_id').val();
            var currency_id = $('#currency_id').val();
            var count = $('#count').val();
            var price = $('#price').val();
            var data={
            "_token": "{{ csrf_token() }}",
                'event_material_id':event_material_id,
                'count':count,
                'price':price,
                'company_id':company_id,
                'currency_id':currency_id,
                'type':'materials'
            };
            if ($.trim(price) != '' || price != 0){
            $.post(add_invoice_materials_url, data, function(data){
            $('#invoice-body').empty()
            data.forEach((element,index) => {
                var row = createTRMaterial(element,index);
                $("#invoice-body").append(row);
                });
            });
            };
        });
        function onDelete(invoice_id) {
            var invoice_id = invoice_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'event_material_id':event_material_id,
                'invoice_id':invoice_id,
            };
            $.post(remove_invoice_materials_url, data, function(data){
                $('#invoice-body').empty()
                data.forEach((element,index) => {
                    var row = createTRMaterial(element,index);
                    $("#invoice-body").append(row);
                });
                });
        }
        function createTRMaterial(element,index) {
            return $(" <tr><th class='col-2'  scope='row'>"+index+"</th><td class='col-2' >"+element.company.name+"</td><td class='col-2' >"+element.currency.name+"</td><td class='col-2' >"+element.price+"</td><td class='col-2' >"+element.count+"</td><td class='col-2' >"+element.created_at.substr(0,10)+"</td><td class='col-2' ><button onclick='onDelete("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td></tr>");
        }


    </script>
@endpush
