<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', ], null, ['class' => 'form-control', 'placeholder' => 'Pick a User Id...']) !!}
</div>


<!-- Financial Covenant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('financial_covenant_id', 'Financial Covenant Id:') !!}
    {!! Form::select('financial_covenant_id', ], null, ['class' => 'form-control', 'placeholder' => 'Pick a Financial Covenant Id...']) !!}
</div>


<!-- Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('outlays.index') }}" class="btn btn-secondary">Cancel</a>
</div>
