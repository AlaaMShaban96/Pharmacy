<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', trans('drugDosages.name')) !!}
    <p>{{ $drugDosage->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $drugDosage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $drugDosage->updated_at }}</p>
</div>

