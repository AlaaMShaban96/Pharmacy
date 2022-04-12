<div class="row">

    <!-- Financial Covenant Id Field -->
    <div class="col-sm-4">
        {!! Form::label('financial_covenant_id', 'Financial Covenant Id:') !!}
        {!! Form::select('financial_covenant_id',$financialCovenants,null, ['class' => ' form-control']) !!}
    </div>
    <!-- Note Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('note', 'Note:') !!}
        {!! Form::text('note', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Price Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    </div>

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('outlays.index') }}" class="btn btn-secondary">Cancel</a>
</div>
