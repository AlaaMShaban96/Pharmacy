<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $clause->name }}</p>
</div>

<!-- Financial Covenant Type Id Field -->
<div class="form-group">
    {!! Form::label('financial_covenant_type_id', 'Financial Covenant Type Id:') !!}
    <p>{{ $clause->financial_covenant_type_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $clause->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $clause->updated_at }}</p>
</div>

