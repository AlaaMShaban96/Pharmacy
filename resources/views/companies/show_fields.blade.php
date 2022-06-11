<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name',  trans('companies.name')) !!}
        <p>{{ $company->name }}</p>
    </div>
    <!-- phone_number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name',  trans('companies.phone_number')) !!}
        <p>{{ $company->phone_number }}</p>
    </div>
    <!-- code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', trans('companies.code')) !!}
        <p>{{ $company->code }}</p>
    </div>
    <!-- type Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', trans('companies.type')) !!}
        <p>{{ $company->type }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $company->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $company->updated_at }}</p>
    </div>

</div>
