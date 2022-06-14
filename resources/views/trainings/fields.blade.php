<div class="row">
    <!-- Training Type Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('training_type_id', $trainingTypes, null, ['class' => 'form-control', 'placeholder' => 'Training Type']) !!}
    </div>
    {{--
    <!-- Training Type Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name :') !!}
        {!! Form::select('name', null, ['class' => 'form-control', 'placeholder' => 'Pick a Training Type Id...']) !!}
    </div> --}}
    <!-- name Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Training Name'] ) !!}
    </div>
    <!-- Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('date', null, ['class' => 'form-control','id'=>'date','placeholder' => 'Start Date']) !!}
    </div>
    @push('scripts')
    <script type="text/javascript">
            $('#date').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            })
        </script>
    @endpush
    <!-- End Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date','placeholder' => 'End Date']) !!}
    </div>


    @push('scripts')
    <script type="text/javascript">
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            })
        </script>
    @endpush
    <!-- Loction Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('loction', null, ['class' => 'form-control' ,'placeholder' => 'Loction']) !!}
    </div>

    <!-- Cost Field -->
    <div class="form-group col-sm-6">
        {!! Form::number('cost', null, ['class' => 'form-control','placeholder' => 'Cost']) !!}
    </div>





    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('trainings.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
