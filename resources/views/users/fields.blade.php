<div class="col-sm-2">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-2">
    {!! Form::label('email', 'email:') !!}
    {!! Form::input('string', 'email', null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-4">
    {!! Form::label('password', 'password:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</div>
