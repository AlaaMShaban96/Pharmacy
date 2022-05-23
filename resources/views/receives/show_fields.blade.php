<div class="row">
    <!-- Receive Date Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('receive_date', 'Receive Date:') !!}
        <p>{{ $receive->receive_date }}</p>
    </div>
    @if (request('type')=='receive')
        <!-- Inventory Date Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('inventory_date', 'Inventory Date:') !!}
                <p>{{ $receive->inventory_date }}</p>
            </div>
    @endif


    <!-- Company Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('company_id', 'Company :') !!}
        <p>{{ $receive->company->name }}</p>
    </div>

    <!-- Company Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('company_code', 'Company Code:') !!}
        <p>{{ $receive->company_code }}</p>
    </div>

    <!-- Shipment Number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('shipment_number', 'Shipment Number:') !!}
        <p>{{ $receive->shipment_number }}</p>
    </div>
    @if (request('type')=='receive')
        <!-- Invoice Number Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('invoice_number', 'Invoice Number:') !!}
                <p>{{ $receive->invoice_number }}</p>
            </div>

            <!-- Packing List Number Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('packing_list_number', 'Packing List Number:') !!}
                <p>{{ $receive->packing_list_number }}</p>
            </div>
    @endif


    <!-- Containers Number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('containers_number', 'Containers Number:') !!}
        <p>{{ $receive->containers_number }}</p>
    </div>

    <!-- Pallet Number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('pallet_number', 'Pallet Number:') !!}
        <p>{{ $receive->pallet_number }}</p>
    </div>

    <!-- Shipment Type Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('shipment_type', 'Shipment Type:') !!}
        <p>{{ $receive->shipment_type }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $receive->created_at->format('Y-m-d') }}</p>
    </div>

    {{-- <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $receive->updated_at }}</p>
    </div> --}}
</div>
<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Shipment Models #
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- event ShipmentModels Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('code', 'code:') !!}
                        {!! Form::select('code',$drugscodes, null, ['class' => 'select_search form-control','id'=>'code']) !!}
                    </div>
                    <!-- event ShipmentModels Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('drug_id', 'Drug:') !!}
                        {!! Form::select('drug_id',$drugsSelect, null, ['class' => 'form-control','id'=>'drug_id']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('drug_size', 'Size :') !!}
                        {!! Form::text('drug_size', null, ['class' => 'form-control','id'=>'drug_size']) !!}
                    </div>
                    <!-- Validity Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('validity', 'Validity:') !!}
                        {!! Form::text('validity', null, ['class' => 'form-control','id'=>'validity']) !!}
                    </div>

                    @push('scripts')
                    <script type="text/javascript">
                            $('#validity').datetimepicker({
                                format: 'YYYY-MM-DD HH:mm:ss',
                                useCurrent: true,
                                icons: {
                                    up: "icon-arrow-up-circle icons font-2xl",
                                    down: "icon-arrow-down-circle icons font-2xl"
                                },
                                sideBySide: true
                            })
                        </script>
                    @endpush
                    <div class="form-group col-sm-4">
                        {!! Form::label('playback_number', 'Playback number :') !!}
                        {!! Form::text('playback_number', null, ['class' => 'form-control','id'=>'playback_number']) !!}
                    </div>
                    @if ($receive->type=='inventory')
                        <div class="form-group col-sm-4">
                            {!! Form::label('location ', 'location :') !!}
                            {!! Form::text('location', null, ['class' => 'form-control','id'=>'location']) !!}
                        </div>
                    @endif

                    <div class="form-group col-sm-4">
                        {!! Form::label('count', 'Count:') !!}
                        {!! Form::number('count', null, ['class' => 'form-control','id'=>'count']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('in_kind_inventory', 'In-kind inventory:') !!}
                        {!! Form::number('in_kind_inventory', null, ['class' => 'form-control','id'=>'in_kind_inventory']) !!}
                    </div>
                    @if ($receive->type=='receive')
                        <div class="form-group col-sm-4">
                            {!! Form::label('samples', 'Samples :') !!}
                            {!! Form::number('samples', null, ['class' => 'form-control','id'=>'samples']) !!}
                        </div>
                    @endif

                    <div class="form-group col-sm-4">
                        {!! Form::label('damaged', 'damaged :') !!}
                        {!! Form::number('damaged', null, ['class' => 'form-control','id'=>'damaged']) !!}
                    </div>
                    @if ($receive->type=='receive')
                        <div class="form-group col-sm-4">
                            {!! Form::label('free', 'Free :') !!}
                            {!! Form::number('free', null, ['class' => 'form-control','id'=>'free']) !!}
                        </div>
                    @endif

                    <div class="form-group col-sm-4">
                        {!! Form::label('another', 'Another :') !!}
                        {!! Form::number('another', null, ['class' => 'form-control','id'=>'another']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <button id="add-event-material" type="button" class="btn btn-success ">Add</button>
                    </div>
            </div>
            <table class="table table-striped" >
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-2">Code</th>
                    <th class="col-4">Name</th>
                    <th class="col-2">Size</th>
                    <th class="col-4">Validity</th>
                    <th class="col-4">Playback number</th>
                    <th class="col-2">Total missing</th>
                    <th class="col-2">Total surplus</th>
                    <th class="col-2">After payment</th>
                    <th class="col-2">Total</th>

                    <th class="col-4">Action</th>
                  </tr>
                </thead>
                <tbody id="receive-body"  >
                    @foreach ($receive->shipmentModels as $key=> $shipmentModel)
                        <tr>
                            <th class='col-2'  scope='row'>{{$key}}</th>
                            <td class='col-2' >{{$shipmentModel->code}}</td>
                            <td class='col-4' >{{$shipmentModel->drug->name}}</td>
                            <td class='col-2' >{{$shipmentModel->drug_size}}</td>
                            <td class='col-4' >{{$shipmentModel->validity}}</td>
                            <td class='col-4' >{{$shipmentModel->playback_number}}</td>
                            <td class='col-2 text-danger' >{{$shipmentModel->total_missing}}</td>
                            <td class='col-2 text-success' >{{$shipmentModel->total_surplus}}</td>
                            <td class='col-2 text-warning' >{{$shipmentModel->after_payment}}</td>
                            <td class='col-2 text-info' >{{$shipmentModel->total}}</td>

                            <td class='col-4 btn-group' >
                                <a href='{{ route('shipmentModels.show', $shipmentModel->id) }}' class='btn btn-ghost-success'><i class='fa fa-eye'></i></a>
                                <button value="{{$shipmentModel->id}}" type='button' class='delete-confirm btn btn-danger'><i class="fa fa-trash"></i></button>
                            </td>
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
        var add_shipmentModels_url=@json(route('addShipmentModels'));
        var remove_shipmentModels_url=@json(route('removeShipmentModels'));
        var receiveId =@json($receive->id);
        var drugs=@json($drugs);
        setCode();
        createEventDelete();

        $('#add-event-material').on('click', function(){

            var code = $('#code').val();
            var drug_id = $('#drug_id').val();
            var drug_size = $('#drug_size').val();
            var validity = $('#validity').val();
            var playback_number = $('#playback_number').val();
            var count = $('#count').val();
            var in_kind_inventory = $('#in_kind_inventory').val();
            var samples = $('#samples').val();
            var damaged = $('#damaged').val();
            var free = $('#free').val();
            var location = $('#location').val();
            var another = $('#another').val();

            var data={
                "_token": "{{ csrf_token() }}",
                'code':code,
                'drug_id':drug_id,
                'drug_size':drug_size,
                'validity':validity,
                'playback_number':playback_number,
                'count':count,
                'in_kind_inventory':in_kind_inventory,
                'samples':samples,
                'damaged':damaged,
                'free':free,
                'location':location,
                'another':another,
                'receive_id':receiveId
            };
            if ($.trim(count) != '' || count != 0){
            $.post(add_shipmentModels_url, data, function(data){
            $('#receive-body').empty()
                data.forEach((element,index) => {
                    var row = createTRMaterial(element,index);
                    $("#receive-body").append(row);
                    });
                    createEventDelete();

                });
                clean();

            };
        });
        function onDelete(shipment_model_id) {
            console.log(shipment_model_id);
            var shipment_model_id = shipment_model_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'shipment_model_id':shipment_model_id,
                'receive_id':receiveId
            };
            $.post(remove_shipmentModels_url, data, function(data){
                $('#receive-body').empty()
                    data.forEach((element,index) => {
                        var row = createTRMaterial(element,index);
                        $("#receive-body").append(row);
                    });
                    createEventDelete();
            });
        }
        function createTRMaterial(element,index) {
            return $('<tr>').html("<th class='col-2'  scope='row'>"+index
                                +"</th><td class='col-2' >"+element.code
                                +"</th><td class='col-4' >"+element.drug.name
                                +"</th><td class='col-2' >"+element.drug_size
                                +"</th><td class='col-4' >"+element.validity
                                +"</th><td class='col-4' >"+element.playback_number
                                +"</th><td class='col-2 text-danger' >"+element.total_missing
                                +"</th><td class='col-2 text-success' >"+element.total_surplus
                                +"</th><td class='col-2 text-warning' >"+element.after_payment
                                +"</th><td class='col-2 text-info' >"+element.total
                                +"</td><td class='col-2 btn-group' ><a href='{{ route('shipmentModels.show', ".element.id.") }}' class='btn btn-ghost-success'><i class='fa fa-eye'></i></a><button value='"+element.id+"'  type='button' class='delete-confirm btn btn-danger'><i class='fa fa-trash'></i></button></td>");
        }
        $('#code').change(function(e) {
            setCode();
        });

        function setCode() {

            console.log(drugs);
           var code=$('#code').val();
            drugs.forEach(element => {
                if (element.id==code) {
                    // $('#drug_id').data('selectize').setValue(element.id);
                    $('#drug_id').val(element.id);

                    $('#drug_size').val(element.drug_dosage.name);
                }
            });
        }
        function clean() {
            $('#code').val('');
            $('#drug_id').val('');
            $('#drug_size').val('');
            $('#validity').val('');
            $('#playback_number').val('');
            $('#count').val('');
            $('#in_kind_inventory').val('');
            $('#samples').val('');
            $('#damaged').val('');
            $('#location').val('');
            $('#free').val('');
            $('#another').val('');
        }
        function createEventDelete() {
            $('.delete-confirm').click(function (event) {
            var id =  $(this).val();
            event.preventDefault();
            swal('Are you sure?', {  dangerMode: true,  buttons: true,})
            .then(function(value) {
                    if (value) {
                        onDelete(id);
                    }
                });
            });
        }

</script>
@endpush
