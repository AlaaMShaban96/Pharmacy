<div class="row">
    <!-- Code Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code', 'Code:') !!}
        {!! Form::select('code',$drugscodes, null, ['class' => 'select_search form-control','id'=>'code']) !!}
    </div>

    <!-- Drug Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('drug_id', 'Drug Id:') !!}
        {!! Form::select('drug_id', $drugsSelect,null, ['id'=>'drug_id','class' => 'form-control', 'placeholder' => 'Pick a Drug Id...']) !!}
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


    <!-- Playback Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('playback_number', 'Playback Number:') !!}
        {!! Form::text('playback_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('location', 'Location:') !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Count Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('count', 'Count:') !!}
        {!! Form::number('count', null, ['class' => 'form-control']) !!}
    </div>

    <!-- In Kind Inventory Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('In_kind_inventory', 'In Kind Inventory:') !!}
        {!! Form::number('in_kind_inventory', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Samples Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('samples', 'Samples:') !!}
        {!! Form::number('samples', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Damaged Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('damaged', 'Damaged:') !!}
        {!! Form::number('damaged', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Free Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('free', 'Free:') !!}
        {!! Form::number('free', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Another Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('another', 'Another:') !!}
        {!! Form::number('another', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('shipmentModels.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
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
                    // $('#company_id').val(element.company_id);
                    $('#drug_id').val(element.id);
                    // $('#price').val(element.selling_price );
                }
            });
        }
</script>
@endpush
