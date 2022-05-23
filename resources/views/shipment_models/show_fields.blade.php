<div class="row">
    <!-- Code Field -->
    <div class="form-group col-4">
        {!! Form::label('code', 'Code:') !!}
        <p>{{ $shipmentModel->code }}</p>
    </div>
    <!-- Drug Id Field -->
    <div class="form-group col-4">
        {!! Form::label('drug_id', 'Drug Id:') !!}
        <p>{{ $shipmentModel->drug->name }}</p>
    </div>
    <!-- Validity Field -->
    <div class="form-group col-4">
        {!! Form::label('validity', 'Validity:') !!}
        <p>{{ $shipmentModel->validity }}</p>
    </div>
    <!-- Playback Number Field -->
    <div class="form-group col-4">
        {!! Form::label('playback_number', 'Playback Number:') !!}
        <p>{{ $shipmentModel->playback_number }}</p>
    </div>
    <!-- Location Field -->
    <div class="form-group col-4">
        {!! Form::label('location', 'Location:') !!}
        <p>{{ $shipmentModel->location }}</p>
    </div>
    <!-- Count Field -->
    <div class="form-group col-4">
        {!! Form::label('count', 'Count:') !!}
        <p>{{ $shipmentModel->count }}</p>
    </div>
    <!-- In Kind Inventory Field -->
    <div class="form-group col-4">
        {!! Form::label('In_kind_inventory', 'In Kind Inventory:') !!}
        <p>{{ $shipmentModel->In_kind_inventory }}</p>
    </div>
    <!-- Samples Field -->
    <div class="form-group col-4">
        {!! Form::label('samples', 'Samples:') !!}
        <p>{{ $shipmentModel->samples }}</p>
    </div>
    <!-- Damaged Field -->
    <div class="form-group col-4">
        {!! Form::label('damaged', 'Damaged:') !!}
        <p>{{ $shipmentModel->damaged }}</p>
    </div>
    <!-- Free Field -->
    <div class="form-group col-4">
        {!! Form::label('free', 'Free:') !!}
        <p>{{ $shipmentModel->free }}</p>
    </div>
    <!-- Another Field -->
    <div class="form-group col-4">
        {!! Form::label('another', 'Another:') !!}
        <p>{{ $shipmentModel->another }}</p>
    </div>
    <!-- Created At Field -->
    <div class="form-group col-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $shipmentModel->created_at }}</p>
    </div>
    <!-- Updated At Field -->
    <div class="form-group col-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $shipmentModel->updated_at }}</p>
    </div>
</div>
