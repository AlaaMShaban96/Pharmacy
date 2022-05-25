<div class="row">
    <!-- Code Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::select('code',$drugscodes, null, ['class' => 'select_search form-control','id'=>'code']) !!}
</div>

    <!-- Company Id Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::select('company_id', $companies, null, ['class' => 'form-control','id'=>'company_id']) !!}
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


    <!-- Store Id Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Id:') !!}
    {!! Form::select('store_id', $stores, null, ['class' => 'form-control', 'placeholder' => 'Pick a Store Id...']) !!}
    </div>


    <!-- Price Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control','id'=>'price']) !!}
    </div>
    {!! Form::hidden('drug_id',null, ['id'=>'drug_id']) !!}
    <!-- Price Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('price', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control','id'=>'price']) !!}
    </div>
{{--
    <!-- User Id Field -->
    <div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id',$stores, null, ['class' => 'form-control', 'placeholder' => 'Pick a User Id...']) !!}
    </div> --}}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @if (isset($sampleReceived))
    <a href="{{ route('sampleReceiveds.show',$sampleReceived->code) }}" class="btn btn-secondary">Cancel</a>
    @else
    <a href="{{ route('sampleReceiveds.index') }}" class="btn btn-secondary">Cancel</a>

    @endif
</div>
@push('scripts')
<script type="text/javascript">

        var drugs=@json($drugs);
        setCode();
        $('#code').change(function(e) {
            setCode();
        });

        function setCode() {

            console.log(drugs);
           var code=$('#code').val();
            drugs.forEach(element => {
                if (element.code==code) {
                    // $('#drug_id').data('selectize').setValue(element.id);
                    // $('#validity').val(element.validity);
                    $('#company_id').val(element.company_id);
                    $('#drug_id').val(element.id);
                    $('#price').val(element.selling_price );
                }
            });
        }
</script>
@endpush
