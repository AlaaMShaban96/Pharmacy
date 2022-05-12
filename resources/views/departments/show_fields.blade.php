<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $department->name }}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', 'User Id:') !!}
        <p>{{ $department->user->name }}</p>
    </div>

    <!-- D Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('d_code', 'D Code:') !!}
        <p>{{ $department->d_code }}</p>
    </div>

    <!-- N Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('n_code', 'N Code:') !!}
        <p>{{ $department->n_code }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $department->created_at }}</p>
    </div>

    {{-- <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $department->updated_at }}</p>
    </div> --}}
</div>

<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Financial Covenant Types #
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- event Materials Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('user_id', 'Name:') !!}
                        {!! Form::text('name:', null, ['class' => 'form-control','id'=>'name']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('medical_representative', 'Cost:') !!}
                        {!! Form::number('cost', null, ['class' => 'form-control','id'=>'cost']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <button id="add-event-material" type="button" class="btn btn-success ">Add</button>

                    </div>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-4">Name</th>
                    <th class="col-2">Code</th>
                    <th class="col-2">Cost</th>
                    <th class="col-2">Action</th>
                  </tr>
                </thead>
                <tbody id="material-body">
                    @foreach ($department->financialCovenantTypes as $key=> $financialCovenantTypes)
                        <tr>
                            <th class='col-2'  >{{$key}}</th>
                            <td class='col-4' >{{$financialCovenantTypes->name}}</td>
                            <td class='col-2' >{{$financialCovenantTypes->code}}</td>
                            <td class='col-2' >{{$financialCovenantTypes->cost}}</td>
                            <td class='col-2' >
                                <a href='{{ route('financialCovenantTypes.show', $financialCovenantTypes->id) }}' class='btn btn-ghost-success'><i class='fa fa-eye'></i></a>
                                <button onclick="onDelete({{$financialCovenantTypes->id}})" type='button' class='btn btn-danger'>Delete</button></td>
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
        var add_types_url=@json(route('addFinancialCovenantTypes'));
        var remove_types_url=@json(route('removeFinancialCovenantTypes'));
        var departmentId =@json($department->id);
        $('#add-event-material').on('click', function(){
            var name = $('#name').val();
            var cost = $('#cost').val();
            var data={
            "_token": "{{ csrf_token() }}",
                'name':name,
                'cost':cost,
                'department_id':departmentId
            };
            if ($.trim(cost) != '' || cost != 0){
            $.post(add_types_url, data, function(data){
            $('#material-body').empty();
            data.forEach((element,index) => {
                var row = createTRMaterial(element,index);
                $("#material-body").append(row);
                });
            });
            };
        });
        function onDelete(financial_covenant_type_id) {
            var financial_covenant_type_id = financial_covenant_type_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'financial_covenant_type_id':financial_covenant_type_id,
                'department_id':departmentId
            };
            $.post(remove_types_url, data, function(data){
                $('#material-body').empty();
                data.forEach((element,index) => {
                    var row = createTRMaterial(element,index);
                    $("#material-body").append(row);
                });
                });
        }
        function createTRMaterial(element,index) {
            return $(" <tr><th class='col-2'>"+index+"</th><td class='col-4' >"+element.name+"</td><td class='col-2' >"+element.code+"</td><td class='col-2' >"+element.cost+"</td><td class='col-2' ><a href='{{ route('financialCovenantTypes.show', ".element.id.") }}' class='btn btn-ghost-success'><i class='fa fa-eye'></i></a><button onclick='onDelete("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td></tr>");
        }
</script>
@endpush
