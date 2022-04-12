<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $financialCovenant->name }}</p>
    </div>

    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        <p>{{ $financialCovenant->amount }}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', 'User:') !!}
        <p>{{ $financialCovenant->user->name }}</p>
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        <p>{{ $financialCovenant->total??0 }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $financialCovenant->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $financialCovenant->updated_at }}</p>
    </div>
</div>
