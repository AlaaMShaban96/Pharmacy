<div class="row">
 <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('code', 'Cost:') !!}
        {!! Form::number('cost', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Department Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('department_id', 'Department Id:') !!}
        {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('financialCovenantTypes.index') }}" class="btn btn-secondary">Cancel</a>
</div>
