<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $financialCovenantType->name }}</p>
    </div>

    <!-- Code Field -->
    <div class="form-group col-sm-4 ">
        {!! Form::label('code', 'Code:') !!}
        <p>{{ $financialCovenantType->code }}</p>
    </div>

    <!-- Department Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financial_covenant_type_id', 'Department Id:') !!}
        <p>{{ $financialCovenantType->department_id }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $financialCovenantType->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $financialCovenantType->updated_at }}</p>
    </div>
</div>

<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Clauses #
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- event Materials Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('user_id', 'Name:') !!}
                        {!! Form::text('name:', null, ['class' => 'form-control','id'=>'name']) !!}
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
                    <th class="col-2">Action</th>
                  </tr>
                </thead>
                <tbody id="material-body">
                    @foreach ($financialCovenantType->clauses as $key=> $clause)
                        <tr>
                            <th class='col-2'  >{{$key}}</th>
                            <td class='col-4' >{{$clause->name}}</td>
                            <td class='col-2' ><button onclick="onDelete({{$clause->id}})" type='button' class='btn btn-danger'>Delete</button></td>
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
        var add_clause_url=@json(route('addClause'));
        var remove_clause_url=@json(route('removeClause'));
        var financial_covenant_type_id =@json($financialCovenantType->id);
        $('#add-event-material').on('click', function(){
            var name = $('#name').val();
            var data={
            "_token": "{{ csrf_token() }}",
                'name':name,
                'financial_covenant_type_id':financial_covenant_type_id
            };
            if ($.trim(name) != ''){
            $.post(add_clause_url, data, function(data){
            $('#material-body').empty()
            data.forEach((element,index) => {
                var row = createTRMaterial(element,index);
                $("#material-body").append(row);
                });
            });
            };
        });
        function onDelete(clause_id) {
            var clause_id = clause_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'clause_id':clause_id,
                'financial_covenant_type_id':financial_covenant_type_id
            };
            $.post(remove_clause_url, data, function(data){
                $('#material-body').empty()
                data.forEach((element,index) => {
                    var row = createTRMaterial(element,index);
                    $("#material-body").append(row);
                });
                });
        }
        function createTRMaterial(element,index) {
            return $(" <tr><th class='col-2'>"+index+"</th><td class='col-4' >"+element.name+"</td><td class='col-2' ><button onclick='onDelete("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td></tr>");
        }
</script>
@endpush
