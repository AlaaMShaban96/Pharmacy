<div class="row">
    <!-- Receive Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('receive_date', 'Receive Date:') !!}
        {!! Form::text('receive_date', null, ['class' => 'form-control','id'=>'receive_date']) !!}
    </div>

    @push('scripts')
    <script type="text/javascript">
            $('#receive_date').datetimepicker({
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


    @if (request('type')=='receive')
    <!-- Inventory Date Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('inventory_date', 'Inventory Date:') !!}
            {!! Form::text('inventory_date', null, ['class' => 'form-control','id'=>'inventory_date']) !!}
        </div>
    @endif


    @push('scripts')
    <script type="text/javascript">
            $('#inventory_date').datetimepicker({
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


    <!-- stor Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('company_id', 'Store Id:') !!}
        {!! Form::select('store_id', $stores, null, ['class' => 'form-control']) !!}
    </div>
    <!-- Company Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('company_id', 'Company Id:') !!}
        {!! Form::select('company_id', $companies, null, ['class' => 'form-control','id'=>'company_id']) !!}
    </div>

    <!-- Company Code Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('company_code', 'Company Code:') !!}
        {!! Form::text('company_code', null, ['class' => 'form-control','id'=>'company_code']) !!}
    </div>

    <!-- Shipment Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('shipment_number', 'Shipment Number:') !!}
        {!! Form::text('shipment_number', null, ['class' => 'form-control']) !!}
    </div>

    @if (request('type')=='receive')
        <!-- Invoice Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('invoice_number', 'Invoice Number:') !!}
            {!! Form::text('invoice_number', null, ['class' => 'form-control']) !!}
        </div>



        <!-- Packing List Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('packing_list_number', 'Packing List Number:') !!}
            {!! Form::text('packing_list_number', null, ['class' => 'form-control']) !!}
        </div>
    @endif
    <!-- Containers Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('containers_number', 'Containers Number:') !!}
        {!! Form::number('containers_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Pallet Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pallet_number', 'Pallet Number:') !!}
        {!! Form::number('pallet_number', null, ['class' => 'form-control']) !!}
    </div>
    @if (request('type')=='receive')
    <!-- Shipment Type Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('shipment_type', 'Shipment Type:') !!}
            {!! Form::select('shipment_type', ['air_freight'=>'Air freight', 'sea_freight'=>'Sea freight'], null, ['class' => 'form-control']) !!}
        </div>
    @endif


</div>
<input type="hidden" name="type" value="{{request('type')}}">
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('receives.index',['type'=>request('type')]) }}" class="btn btn-secondary">Cancel</a>
</div>
@push('scripts')

<script type="text/javascript">


        var companies=@json($all_companies);
        setCompanyCode();
        $('#company_id').change(function(e) {
            setCompanyCode();
        });

        function setCompanyCode() {
            $('#company_code').val('');
            var company_id=$('#company_id').val();
            companies.forEach(element => {
                if (element.id==company_id) {
                    $('#company_code').val(element.code);
                }
            });
        }

    </script>
@endpush
