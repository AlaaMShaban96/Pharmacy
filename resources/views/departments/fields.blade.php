<div class="row">
   <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', 'User Id:') !!}
        {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
    </div>


    <!-- D Code Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('d_code', 'D Code:') !!}
        {!! Form::text('d_code', null, ['class' => 'form-control']) !!}
    </div>

    <!-- N Code Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('n_code', 'N Code:') !!}
        {!! Form::text('n_code', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
</div>
