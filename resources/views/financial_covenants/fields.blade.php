<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::label('user_id', 'User:') !!}
        {!! Form::select('user_id',$users,null, ['class' => ' form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('financialCovenants.index') }}" class="btn btn-secondary">Cancel</a>
</div>
