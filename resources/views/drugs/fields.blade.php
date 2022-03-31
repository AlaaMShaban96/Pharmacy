<div class="row">

    <div class="col-sm-4">
        {!! Form::label('name', 'ATC:') !!}
        {!! Form::input('string', 'atc', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'name:') !!}
        {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'B/G:') !!}
        {!! Form::input('string', 'b_g', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'Ingredients:') !!}
        {!! Form::input('string', 'ingredients', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'Price:') !!}
        {!! Form::number('price', null, ['class' => 'form-control','step' => '0.1']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('companies', 'Company:') !!}
        {!! Form::select('company_id',$companies,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('drugDosage', 'Drug dosage:') !!}
        {!! Form::select('drug_dosage_id',$drugDosage,null, ['class' => ' form-control']) !!}
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('drugs.index') }}" class="btn btn-secondary">Cancel</a>
</div>
