
  <div class="col-sm-4">
    {!! Form::label('name', 'name:') !!}
    {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
</div>
