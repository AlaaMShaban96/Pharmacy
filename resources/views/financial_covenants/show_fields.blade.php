<div class="row">
<!-- Department Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('department_id', 'Department:') !!}
        <p>{{ $financialCovenant->department->name }}</p>
    </div>

    <!-- Financial Covenant Type Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financial_covenant_id', 'Financial Covenant Type Id:') !!}
        <p>{{ $financialCovenant->financialCovenantType->name }}</p>
    </div>

    <!-- Number Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('number', 'Number:') !!}
        <p>{{ $financialCovenant->number }}</p>
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
     <!-- Created At Field -->
     <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $financialCovenant->created_at->format('Y-m-d') }}</p>
    </div>
    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        <p id="amount">{{ $financialCovenant->amount }}</p>
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        <p id="total">{{ $financialCovenant->total??0 }}</p>
    </div>
    <!-- remaining At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Remaining:') !!}
        <p id="remaining">{{ $financialCovenant->amount-$financialCovenant->total }}</p>
    </div>



</div>

<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Outlays #
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- clause_id Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('clause_id', 'Clause:') !!}
                        {!! Form::select('clause_id:',$clauses, null, ['class' => 'form-control','id'=>'clause_id']) !!}
                    </div>
                    <!-- price Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('price', 'Price:') !!}
                        {!! Form::number('price:', null, ['class' => 'form-control','id'=>'price']) !!}
                    </div>
                    <!-- count Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('count', 'Count:') !!}
                        {!! Form::number('count:', null, ['class' => 'form-control','id'=>'count']) !!}
                    </div>
                    <!-- price Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('note', 'Note:') !!}
                        {!! Form::text('note:', null, ['class' => 'form-control','id'=>'note']) !!}
                    </div>
                    @if ($financialCovenant->amount != $financialCovenant->total)
                        <div class="form-group col-sm-6">
                            <button id="add-event-material" type="button" class="btn btn-success ">Add</button>
                        </div>
                    @else

                    @endif

            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-2">Name</th>
                    <th class="col-2">User</th>
                    <th class="col-2">Price</th>
                    <th class="col-2">Count</th>
                    <th class="col-2">Note</th>
                    <th class="col-2">Action</th>
                  </tr>
                </thead>
                <tbody id="outlays-body">

                    @foreach ($financialCovenant->outlays as $key=> $outlay)
                        <tr>
                            <th class='col-2'  >{{$key}}</th>
                            <td class='col-2' >{{$outlay->clause->name}}</td>
                            <td class='col-2' >{{$outlay->user->name}}</td>
                            <td class='col-2' >{{$outlay->price}}</td>
                            <td class='col-2' >{{$outlay->count}}</td>
                            <td class='col-2' >{{$outlay->note}}</td>

                            <td class='col-2' ><button onclick="onDelete({{$outlay->id}})" type='button' class='btn btn-danger'>Delete</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">

        // var clauses =@json($clauses);
        var add_outlay_url=@json(route('addOutlays'));
        var remove_outlay_url=@json(route('removeOutlays'));
        var financial_covenant_id =@json($financialCovenant->id);
        // var financial_covenant_type_id =@json($financialCovenant->financial_covenant_type_id);

        $('#add-event-material').on('click', function(){
            var clause_id = $('#clause_id').val();
            var price = $('#price').val();
            var count = $('#count').val();
            var note = $('#note').val();

            var data={
            "_token": "{{ csrf_token() }}",
                'clause_id':clause_id,
                'price':price,
                'count':count,
                'note':note,
                'financial_covenant_id':financial_covenant_id
            };
            if ($.trim(price) != ''){
                $.post(add_outlay_url, data, function(data){
                    console.log(data);
                    if (data.error) {
                        alert("something error!!!!");
                    }else{
                        $('#outlays-body').empty()
                        data.forEach((element,index) => {
                            var row = createTRMaterial(element,index);
                            $("#outlays-body").append(row);
                        });
                    }

                });
            };
        });
        function onDelete(outlay_id) {
            var outlay_id = outlay_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'outlay_id':outlay_id,
                'financial_covenant_id':financial_covenant_id
            };
            $.post(remove_outlay_url, data, function(data){
                $('#outlays-body').empty()
                data.forEach((element,index) => {
                    var row = createTRMaterial(element,index);
                    $("#outlays-body").append(row);
                });
                });
        }
        function createTRMaterial(element,index) {
            return $(" <tr><th class='col-2'>"+index+"</th><td class='col-4' >"+element.clause.name+"</td><td class='col-4' >"+element.user.name+"</td><td class='col-2' >"+element.price+"</td><td class='col-2' >"+element.count+"</td><td class='col-4' >"+element.note+"</td><td class='col-2' ><button onclick='onDelete("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td></tr>");
        }
        // function calculator(price) {
        //     let amount =$('#amount').val();
        //     let total =$('#total').val();

        //     total +=price;

        //     $('#total').val(total)
        //     $('#remaining').val((amount-total))
        // }

</script>
@endpush
