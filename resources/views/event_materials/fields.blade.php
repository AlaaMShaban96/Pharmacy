<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>
<!-- Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Count:') !!}
    {!! Form::number('count', null, ['class' => 'form-control']) !!}
</div>
<br>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('eventMaterials.index') }}" class="btn btn-secondary">Cancel</a>
</div>
