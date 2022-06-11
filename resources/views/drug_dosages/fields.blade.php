
<div class="col-sm-4">
    {!! Form::label('name', trans('drugDosages.name')) !!}
    {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
</div>
<br>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('drugDosages.index') }}" class="btn btn-secondary">@lang('app.cancale')</a>
</div>
