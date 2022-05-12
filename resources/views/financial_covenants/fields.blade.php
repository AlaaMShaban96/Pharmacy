<div class="row">
    <!-- Users Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', 'User Id:') !!}
        {!! Form::select('user_id',$users, null, ['class' => 'form-control']) !!}
    </div>

<!-- Department Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('department_id', 'Department Id:') !!}
    {!! Form::select('department_id',$departments, null, ['class' => 'form-control']) !!}
</div>
    <!-- Financial Covenant Type Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financial_covenant_type_id', 'Financial Covenant Type Id:') !!}
        {!! Form::select('financial_covenant_type_id',  $financialCovenantTypes, null, ['class' => 'form-control']) !!}
    </div>

{{--
    <!-- Number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('number', 'Number:') !!}
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
    </div> --}}

    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>

    {{-- <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        {!! Form::number('total', null, ['class' => 'form-control']) !!}
    </div> --}}
    <!-- Date Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('date', 'Date:') !!}
        {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
    </div>

    @push('scripts')
    <script type="text/javascript">
            $('#date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                icons: {
                    up: "icon-arrow-up-circle icons font-2xl",
                    down: "icon-arrow-down-circle icons font-2xl"
                },
                sideBySide: true
            })
        </script>
    @endpush


    <!-- Note Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('note', 'Note:') !!}
        {!! Form::text('note', null, ['class' => 'form-control']) !!}
    </div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('financialCovenants.index') }}" class="btn btn-secondary">Cancel</a>
</div>
