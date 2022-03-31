<div class="col-sm-4">
    {!! Form::label('name', 'ATC:') !!}
    {!! Form::input('string', 'ATC', null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-4">
    {!! Form::label('name', 'name:') !!}
    {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-4">
    {!! Form::label('name', 'B/G:') !!}
    {!! Form::input('string', 'B_G', null, ['class' => 'form-control']) !!}
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
