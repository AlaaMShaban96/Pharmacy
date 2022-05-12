<div class="row">
<!-- Department Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('department_id', 'Department:') !!}
        <p>{{ $financialCovenant->department->name }}</p>
    </div>

    <!-- Financial Covenant Type Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financial_covenant_type_id', 'Financial Covenant Type Id:') !!}
        <p>{{ $financialCovenant->financialCovenantType->name }}</p>
    </div>

    <!-- Number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('number', 'Number:') !!}
        <p>{{ $financialCovenant->number }}</p>
    </div>

    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        <p>{{ $financialCovenant->amount }}</p>
    </div>

    <!-- Date Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('date', 'Date:') !!}
        <p>{{ $financialCovenant->date }}</p>
    </div>

    <!-- Note Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('note', 'Note:') !!}
        <p>{{ $financialCovenant->note }}</p>
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        <p>{{ $financialCovenant->total??0 }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $financialCovenant->created_at->format('Y-m-d') }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $financialCovenant->updated_at->format('Y-m-d') }}</p>
    </div>
</div>
