<div class="row">
    <!-- Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('code', 'Code:') !!}
        <p>{{ $orderRequest->code }}</p>
    </div>
    <!-- Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('code', 'Doctor:') !!}
        <p>{{ $orderRequest->doctor->name }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $orderRequest->created_at }}</p>
    </div>

    {{-- <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $orderRequest->updated_at }}</p>
    </div> --}}
</div>

