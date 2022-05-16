<div class="row">
    <!-- Users Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', 'User Id:') !!}
        {!! Form::select('user_id',$users, null, ['class' => 'form-control']) !!}
    </div>

<!-- Department Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('department_id', 'Department Id:') !!}
    {!! Form::select('department_id',$departments, null, ['class' => 'form-control','id'=>'department_id']) !!}
</div>
    <!-- Financial Covenant Type Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financial_covenant_type_id', 'Financial Covenant Type Id:') !!}
        {!! Form::select('financial_covenant_type_id',  $financialCovenantTypes, null, ['class' => 'form-control','id'=>'financialCovenantTypes']) !!}
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
        {!! Form::number('amount', null, ['class' => 'form-control','id'=>'amount']) !!}
    </div>

    {{-- <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        {!! Form::number('total', null, ['class' => 'form-control']) !!}
    </div> --}}
    {{-- <!-- Date Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('date', 'Date:') !!}
        {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
    </div>
 --}}


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
@push('scripts')
<script type="text/javascript">
        var financialCovenantTypes=@json($financialCovenantTypes);
        createSelectFinancialCovenantTypes();
        setAmount();

        $('#department_id').change(function(e) {
            createSelectFinancialCovenantTypes();
        });
        $('#financialCovenantTypes').change(function(e) {
            setAmount();
        });
        function createSelectFinancialCovenantTypes() {
            $('#financialCovenantTypes').find('option').remove().end();
            var x = document.getElementById("financialCovenantTypes");
            var department_id=$('#department_id').val();
            financialCovenantTypes.forEach(element => {
                if (element.department_id==department_id) {
                    var option = $('<option/>');
                    option.attr({ 'value': element.id }).text(element.name);
                    $('#financialCovenantTypes').append(option);
                }
            });
            setAmount();
        }
        function setAmount() {

            let flag=0;
            var financial_covenant_type_id=$('#financialCovenantTypes').val();
            financialCovenantTypes.forEach(element => {
                if (element.id==financial_covenant_type_id) {
                    $('#amount').val(element.cost);
                    flag=1;
                }
            });
            if (flag==0) {
                $('#amount').val(0);

            }
        }
    </script>
@endpush
