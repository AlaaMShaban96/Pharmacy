<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Financial Covenant Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('financial_covenant_type_id', 'Financial Covenant Type Id:') !!}
    {!! Form::select('financial_covenant_type_id', ], null, ['class' => 'form-control', 'placeholder' => 'Pick a Financial Covenant Type Id...']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clauses.index') }}" class="btn btn-secondary">Cancel</a>
</div>
