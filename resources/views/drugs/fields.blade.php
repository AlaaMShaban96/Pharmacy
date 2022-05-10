<div class="row">

    <div class="col-sm-2">
        {!! Form::label('atc', 'U-Code:') !!}
        {!! Form::input('string', 'atc', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('code', 'S-Code:') !!}
        {!! Form::input('string', 'code', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'Brand Name:') !!}
        {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'B/G:') !!}
        {!! Form::input('string', 'b_g', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', 'Registration number:') !!}
        {!! Form::input('string', 'registration_number', null, ['class' => 'form-control']) !!}
    </div>
    {{-- <div class="col-sm-4">
        {!! Form::label('name', 'Agent:') !!}
        {!! Form::input('string', 'agent', null, ['class' => 'form-control']) !!}
    </div> --}}
    <div class="col-sm-4">
        {!! Form::label('name', 'Ingredients:') !!}
        {!! Form::input('string', 'ingredients', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-sm-3">
        {!! Form::label('name', 'Purchase price:') !!}
        {!! Form::number('price', null, ['class' => 'form-control','step' => '0.1']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('name', 'Selling Price:') !!}
        {!! Form::number('selling_price', null, ['class' => 'form-control','step' => '0.1']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('currencies', 'currency:') !!}
        {!! Form::select('currency_id',$currencies,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('stratums', 'Specialty:') !!}
        {!! Form::select('strata_id',$stratums,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('companies', 'Agents:') !!}
        {!! Form::select('company_id',$companies,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('drugDosage', 'Drug dosage:') !!}
        {!! Form::select('drug_dosage_id',$drugDosages,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('packages', 'Package:') !!}
        {!! Form::select('package_id',$packages,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('routes', 'Form:') !!}
        {!! Form::select('route_id',$routes,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('countries_id', 'countries:') !!}
        {!! Form::select('country_id',$countries,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('laboratory_id', 'Suppliers:') !!}
        {!! Form::select('laboratory_id',$laboratories,null, ['class' => ' form-control']) !!}
    </div>


</div>
<!-- Submit Field -->
<div class="form-group col-sm-12 mt-5">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('drugs.index') }}" class="btn btn-secondary">Cancel</a>
</div>
