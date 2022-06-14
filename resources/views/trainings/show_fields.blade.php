<!-- Training Type Id Field -->
<div class="form-group">
    {!! Form::label('training_type_id', 'Training Type Id:') !!}
    <p>{{ $training->training_type_id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $training->date }}</p>
</div>

<!-- Loction Field -->
<div class="form-group">
    {!! Form::label('loction', 'Loction:') !!}
    <p>{{ $training->loction }}</p>
</div>

<!-- Cost Field -->
<div class="form-group">
    {!! Form::label('cost', 'Cost:') !!}
    <p>{{ $training->cost }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $training->end_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $training->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $training->updated_at }}</p>
</div>

