<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $user->name }}</p>
    </div>
    <!-- Mobile Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Mobile:') !!}
        <p>{{ $user->mobile }}</p>
    </div>
    <!-- department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'department:') !!}
        <p>{{ $user->department?$user->department->name:'Admin of the system' }}</p>
    </div>
    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $user->created_at }}</p>
    </div>


</div>

<div id="accordion">
    @can('addToolsToUser')
    <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Tools #
            </button>
          </h5>
        </div>
        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
              <div class="row">
                  <!-- event Materials Field -->
                      <div class="form-group col-sm-6">
                          {!! Form::select('tool_id',$tools, null, ['class' => 'form-control','id'=>'tool_id']) !!}
                      </div>
                      <div class="form-group col-sm-6">
                          <button id="add-tools" type="button" class="btn btn-success ">Add</button>

                      </div>
              </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="col-2">#</th>
                      <th class="col-6">Tool</th>
                        @can('removeToolsToUser')
                            <th class="col-2">Action</th>
                        @endcan
                    </tr>
                  </thead>
                  <tbody id="tools-body">
                      @foreach ($user->tools as $key=> $tool)
                          <tr>
                              <th class='col-2'  scope='row'>{{$key}}</th>
                              <td class='col-6' >{{$tool->name}}</td>
                              <td class='col-2' ><button onclick="onDelete({{$tool->id}})" type='button' class='btn btn-danger'>Delete</button></td>
                          </tr>
                      @endforeach

                  </tbody>
              </table>
          </div>
        </div>
      </div>
    @endcan
    @can('addTrainingToUser')
    <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#Trainings" aria-expanded="true" aria-controls="collapseOne">
                Trainings #
            </button>
          </h5>
        </div>
        <div id="Trainings" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
              <div class="row">
                  <!-- event Materials Field -->
                      <div class="form-group col-sm-6">
                          {!! Form::select('training_id',$trainings, null, ['class' => 'form-control','id'=>'training_id']) !!}
                      </div>
                      <div class="form-group col-sm-6">
                          <button id="add-training" type="button" class="btn btn-success ">Add</button>

                      </div>
              </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="col-2">#</th>
                      <th class="col-6">training</th>
                        @can('removeTrainingToUser')
                        <th class="col-2">Action</th>
                        @endcan
                    </tr>
                  </thead>
                  <tbody id="trainings-body">
                      @foreach ($user->trainings as $key=> $training)
                          <tr>
                              <th class='col-2'  scope='row'>{{$key}}</th>
                              <td class='col-6' >{{$training->name}}</td>
                              <td class='col-2' ><button onclick="onDeleteTraining({{$training->id}})" type='button' class='btn btn-danger'>Delete</button></td>
                          </tr>
                      @endforeach

                  </tbody>
              </table>
          </div>
        </div>
    </div>
    @endcan
    @can('addGoolsToUser')
    <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Gools #
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
              <div class="row">
                  <!-- event Materials Field -->
                      <div class="form-group col-sm-4">
                          {!! Form::text('name', null, ['placeholder'=>"الهدف المراد تحقيقة",'class' => 'form-control','id'=>'name']) !!}
                      </div>
                      <div class="form-group col-sm-2">
                          {!! Form::number('cost', null, ['placeholder'=>"القيمة المراد تحقيقها",'class' => 'form-control','id'=>'cost']) !!}
                      </div>
                      <div class="form-group col-sm-3">
                          {!! Form::text('from', null, ['placeholder'=>"من تاريخ",'class' => 'form-control','id'=>'from']) !!}
                      </div>
                      <div class="form-group col-sm-3">
                          {!! Form::text('to', null, ['placeholder'=>"الي تاريخ",'class' => 'form-control','id'=>'to']) !!}
                      </div>

                      <div class="form-group col-sm-6">
                          <button id="add-gools" type="button" class="btn btn-success ">Add</button>

                      </div>
              </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="col-2">#</th>
                      <th class="col-2">gool</th>
                      <th class="col-2">cost</th>
                      <th class="col-4">from</th>
                      <th class="col-4">to</th>
                        @can('removeGoolsToUser')
                            <th class="col-2">Action</th>
                        @endcan

                    </tr>
                  </thead>
                  <tbody id="gools-body">
                      @foreach ($user->gools as $key=> $gool)
                          <tr>
                              <td class='col-2' >{{$key}}</th>
                              <td class='col-2' >{{$gool->name}}</td>
                              <td class='col-2' >{{$gool->cost}}</td>
                              <td class='col-4' >{{$gool->from}}</td>
                              <td class='col-4' >{{$gool->to}}</td>

                              @can('removeGoolsToUser')
                              <td class='col-2' ><button onclick="onDeleteGool({{$gool->id}})" type='button' class='btn btn-danger'>Delete</button></td>
                              @endcan
                          </tr>
                      @endforeach

                  </tbody>
              </table>
          </div>
        </div>
      </div>
    @endcan

</div>
@push('scripts')
<script type="text/javascript">



        $('#from').datetimepicker({
            format: 'YYYY-MM-DD ',
            useCurrent: true,
            icons: {
                up: "icon-arrow-up-circle icons font-2xl",
                down: "icon-arrow-down-circle icons font-2xl"
            },
            sideBySide: true
        });
        $('#to').datetimepicker({
            format: 'YYYY-MM-DD ',
            useCurrent: true,
            icons: {
                up: "icon-arrow-up-circle icons font-2xl",
                down: "icon-arrow-down-circle icons font-2xl"
            },
            sideBySide: true
        });
        var userId =@json($user->id);

        // this route for add tools to user
        var add_tools_to_user=@json(route('addToolsToUser'));
        var remove_tools_from_user=@json(route('removeToolsToUser'));

        $('#add-tools').on('click', function(){
            var tool_id = $('#tool_id').val();
            var data={
            "_token": "{{ csrf_token() }}",
                'tool_id':tool_id,
                'user_id':userId
            };

            $.post(add_tools_to_user, data, function(data){
            $('#tools-body').empty()
            data.forEach((element,index) => {
                var row = createTRTools(element,index);
                $("#tools-body").append(row);
                });
            });

        });
        function onDelete(tool_id) {
            console.log(tool_id);
            var tool_id = tool_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'tool_id':tool_id,
                'user_id':userId
            };
            $.post(remove_tools_from_user, data, function(data){
                $('#tools-body').empty()
                data.forEach((element,index) => {
                    var row = createTRTools(element,index);
                    $("#tools-body").append(row);
                });
                });
        }
        function createTRTools(element,index) {
            return $(" <tr><th class='col-2'  scope='row'>"+index+
                "</th><td class='col-6' >"+element.name+
                "</td>@can('removeToolsToUser')<td class='col-2' ><button onclick='onDelete("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td>@endcan</tr>");
        }
        // this route for add Trainings to user
        var add_Training_to_user=@json(route('addTrainingToUser'));
        var remove_Training_from_user=@json(route('removeTrainingToUser'));

        $('#add-training').on('click', function(){
            var training_id = $('#training_id').val();
            var data={
            "_token": "{{ csrf_token() }}",
                'training_id':training_id,
                'user_id':userId
            };

            $.post(add_Training_to_user, data, function(data){
            $('#trainings-body').empty()
            data.forEach((element,index) => {
                var row = createTRTrainings(element,index);
                $("#trainings-body").append(row);
                });
            });

        });
        function onDeleteTraining(training_id) {
            console.log(training_id);
            var training_id = training_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'training_id':training_id,
                'user_id':userId
            };
            $.post(remove_Training_from_user, data, function(data){
                $('#trainings-body').empty()
                data.forEach((element,index) => {
                    var row = createTRTools(element,index);
                    $("#trainings-body").append(row);
                });
                });
        }
        function createTRTrainings(element,index) {
            return $(" <tr><th class='col-2'  scope='row'>"+index+
                "</th><td class='col-6' >"+element.name+
                "</td>@can('removeTrainingToUser')<td class='col-2' ><button onclick='onDeleteTraining("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td>@endcan </tr>");
        }

        // this route add gools to user
        var add_gools_to_user=@json(route('addGoolsToUser'));
        var remove_gools_from_user=@json(route('removeGoolsToUser'));


        $('#add-gools').on('click', function(){
            var name = $('#name').val();
            var cost = $('#cost').val();
            var from = $('#from').val();
            var to = $('#to').val();

            var data={
            "_token": "{{ csrf_token() }}",
                'name':name,
                'cost':cost,
                'from':from,
                'to':to,
                'user_id':userId
            };
            console.log(name,cost,from,to);
            if ( name===""|| cost===""  || from==="" || to==="" ) {
                alert("من فضلك اخل كل البيانات ");
            }else{
                $.post(add_gools_to_user, data, function(data){
                $('#gools-body').empty()
                data.forEach((element,index) => {
                    var row = createTRGools(element,index);
                    $("#gools-body").append(row);
                    });
                });
            }
        });
        function onDeleteGool(gool_id) {
            console.log(gool_id);
            var gool_id = gool_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'gool_id':gool_id,
                'user_id':userId
            };
            $.post(remove_gools_from_user, data, function(data){
                $('#gools-body').empty()
                data.forEach((element,index) => {
                    var row = createTRGools(element,index);
                    $("#gools-body").append(row);
                });
                });
        }
        function createTRGools(element,index) {
            return $(" <tr><th class='col-2'  scope='row'>"+index+
                "</th><td class='col-6' >"+element.name+
                "</th><td class='col-6' >"+element.cost+
                "</th><td class='col-6' >"+element.from+
                "</th><td class='col-6' >"+element.to+

                "</td>@can('removeGoolsToUser')<td class='col-2' ><button onclick='onDeleteGool("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td>@endcan</tr>");
        }
</script>
@endpush
