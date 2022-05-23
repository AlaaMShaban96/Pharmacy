<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Drug Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('drug_id', 'Drug Id:') !!}
    {!! Form::select('drug_id', ], null, ['class' => 'form-control', 'placeholder' => 'Pick a Drug Id...']) !!}
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
    {!! Form::number('In_kind_inventory', null, ['class' => 'form-control']) !!}
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
