<div class="row">

    <div class="col-sm-2">
        {!! Form::label('atc', trans('health.U_Code')) !!}
        {!! Form::input('string', 'atc', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('code', trans('health.S_Code')) !!}
        {!! Form::input('string', 'code', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', trans('health.Brand_Name')) !!}
        {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', trans('health.Shelf_life')) !!}
        {!! Form::input('string', 'b_g', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', trans('health.Registration_number')) !!}
        {!! Form::input('string', 'registration_number', null, ['class' => 'form-control']) !!}
    </div>
    {{-- <div class="col-sm-4">
        {!! Form::label('name', 'Agent:') !!}
        {!! Form::input('string', 'agent', null, ['class' => 'form-control']) !!}
    </div> --}}
    <div class="col-sm-4">
        {!! Form::label('name', trans('health.Ingredients')) !!}
        {!! Form::input('string', 'ingredients', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-sm-3">
        {!! Form::label('name', trans('health.Purchase')) !!}
        {!! Form::number('price', null, ['class' => 'form-control','step' => '0.1']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('name', trans('health.Selling_price_LY')) !!}
        {!! Form::number('selling_price', null, ['class' => 'form-control','step' => '0.1']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('currencies', trans('health.Currency')) !!}
        {!! Form::select('currency_id',$currencies,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('stratums', trans('health.Specialty')) !!}
        {!! Form::select('strata_id',$stratums,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('companies', trans('health.Agent')) !!}
        {!! Form::select('company_id',$companies,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('drugDosage', trans('health.Dosage')) !!}
        {!! Form::select('drug_dosage_id',$drugDosages,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('packages', trans('health.Pack_size')) !!}
        {!! Form::select('package_id',$packages,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('routes', trans('health.Form')) !!}
        {!! Form::select('route_id',$routes,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('countries_id', trans('health.Country')) !!}
        {!! Form::select('country_id',$countries,null, ['class' => ' form-control']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::label('laboratory_id', trans('app.Suppliers')) !!}
        {!! Form::select('laboratory_id',$laboratories,null, ['class' => ' form-control','placeholder'=>""]) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12 mt-5">
        {!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('drugs.index') }}" class="btn btn-secondary">@lang('app.cancale')</a>
    </div>
</div>




