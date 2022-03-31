
<div class="row">
        <!-- Atc Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('atc', 'Atc:') !!}
        <p>{{ $drug->atc }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $drug->name }}</p>
    </div>

    <!-- B G Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('b_g', 'B G:') !!}
        <p>{{ $drug->b_g }}</p>
    </div>

    <!-- Ingredients Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('Ingredients', 'Ingredients:') !!}
        <p>{{ $drug->ingredients }}</p>
    </div>

    <!-- Drug Dosage Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('drug_dosage', 'Drug Dosage:') !!}
        <p>{{ $drug->drugDosage->name }}</p>
    </div>

    <!-- Company Id Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('company_id', 'Company Id:') !!}
        <p>{{ $drug->company->name }}</p>
    </div>

    <!-- Price Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('price', 'Price:') !!}
        <p>{{ $drug->price }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $drug->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $drug->updated_at }}</p>
    </div>
</div>

