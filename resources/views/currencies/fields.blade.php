<div class="row">

    <div class="col-sm-4">
          {!! Form::label('name', 'name:') !!}
          {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm-4">
          {!! Form::label('name', 'Price:') !!}
          {!! Form::number('price', null, ['class' => 'form-control','step' => '0.1']) !!}
      </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('currencies.index') }}" class="btn btn-secondary">Cancel</a>
</div>
