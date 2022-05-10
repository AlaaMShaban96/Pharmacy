<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Reg no:') !!}
    {!! Form::text('regNo', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'status:') !!}
    {!! Form::select('status',['registered'=>"registered", 'Not_registered'=>"Not_registered",'in_process'=>"in_process"],null, ['class' => 'form-control']) !!}
</div>
<br>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('laboratories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
