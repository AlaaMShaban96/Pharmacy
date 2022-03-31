<!-- Atc Field -->
<div class="col-sm-4">
    {!! Form::label('ATC', 'Atc:') !!}
    <p>{{ $drug->ATC }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-4">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $drug->name }}</p>
</div>

<!-- B G Field -->
<div class="col-sm-4">
    {!! Form::label('B_G', 'B G:') !!}
    <p>{{ $drug->B_G }}</p>
</div>

<!-- Ingredients Field -->
<div class="col-sm-4">
    {!! Form::label('ingredients', 'Ingredients:') !!}
    <p>{{ $drug->ingredients }}</p>
</div>

<!-- Drug Dosage Id Field -->
<div class="col-sm-4">
    {!! Form::label('drug_dosage_id', 'Drug Dosage Id:') !!}
    <p>{{ $drug->drugDosage->name }}</p>
</div>

<!-- Company Id Field -->
<div class="col-sm-4">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{{ $drug->company->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-4">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $drug->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $drug->updated_at }}</p>
</div>

