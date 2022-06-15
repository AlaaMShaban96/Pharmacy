
@if (auth()->user()->can('Super-Admin') ||auth()->user()->can('Admin-Pro')  )
<div class="row">

    <!-- Name Field -->
    <div class="form-group col-4">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $event->name }}</p>
    </div>

    <!-- Event Specialty Id Field -->
    <div class="form-group col-4">
        {!! Form::label('event_specialty_id', 'Event Specialty :') !!}
        <p>{{ $event->eventSpecialty?$event->eventSpecialty->name:'' }}</p>
    </div>

    <!-- Event Location Id Field -->
    <div class="form-group col-4">
        {!! Form::label('event_location_id', 'Event Location :') !!}
        <p>{{ $event->eventLocation? $event->eventLocation->name:'' }}</p>
    </div>

    <!-- Event Number Field -->
    <div class="form-group col-4">
        {!! Form::label('event_number', 'Event Number:') !!}
        <p>{{ $event->event_number }}</p>
    </div>

    <!-- Event Date Field -->
    <div class="form-group col-4">
        {!! Form::label('event_date', 'Event Date:') !!}
        <p>{{ $event->event_date }}</p>
    </div>

    <!-- Visitors Number Field -->
    <div class="form-group col-4">
        {!! Form::label('visitors_number', 'Visitors Number:') !!}
        <p>{{ $event->visitors_number }}</p>
    </div>

    <!-- Event Food Location Field -->
    <div class="form-group col-4">
        {!! Form::label('event_food_location', 'Event Food Location:') !!}
        <p>{{ $event->event_food_location }}</p>
    </div>

    <!-- Event Spicy Food Location Field -->
    <div class="form-group col-4">
        {!! Form::label('event_spicy_food_location', 'Event Spicy Food Location:') !!}
        <p>{{ $event->event_spicy_food_location }}</p>
    </div>

    <!-- Event Sweet Food Location Field -->
    <div class="form-group col-4">
        {!! Form::label('event_sweet_food_location', 'Event Sweet Food Location:') !!}
        <p>{{ $event->event_sweet_food_location }}</p>
    </div>

    <!-- Media Company Id Field -->
    <div class="form-group col-4">
        {!! Form::label('media_company_id', 'Media Company :') !!}
        <p>{{ $event->mediaCompany? $event->mediaCompany->name:'' }}</p>
    </div>

    <!-- Decoration Company Id Field -->
    <div class="form-group col-4">
        {!! Form::label('decoration_company_id', 'Decoration Company :') !!}
        <p>{{ $event->decorationCompany?$event->decorationCompany->name:'' }}</p>
    </div>

    <!-- Medical Representative Field -->
    <div class="form-group col-4">
        {!! Form::label('medical_representative', 'Medical Representative:') !!}
        <p>{{ $event->medical_representative }}</p>
    </div>

    <!-- Event Time Field -->
    <div class="form-group col-4">
        {!! Form::label('event_time', 'Event Time:') !!}
        <p>{{ $event->event_time }}</p>
    </div>

    <!-- Event Cost Field -->
    <div class="form-group col-4">
        {!! Form::label('event_cost', 'Event Cost:') !!}
        <p>{{ $event->event_cost }}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-4">
        {!! Form::label('user_id', 'User :') !!}
        <p>{{ $event->user->name }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $event->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $event->updated_at }}</p>
    </div>
</div>
@else
<div class="row">

    <!-- Name Field -->
    <div class="form-group col-4">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $event->name }}</p>
    </div>

    <!-- Event Specialty Id Field -->
    <div class="form-group col-4">
        {!! Form::label('event_specialty_id', 'Event Specialty :') !!}
        <p>{{ $event->eventSpecialty?$event->eventSpecialty->name:'' }}</p>
    </div>

    <!-- Event Location Id Field -->
    <div class="form-group col-4">
        {!! Form::label('event_location_id', 'Event Location :') !!}
        <p>{{ $event->eventLocation? $event->eventLocation->name:'' }}</p>
    </div>


    <!-- Event Date Field -->
    <div class="form-group col-4">
        {!! Form::label('event_date', 'Event Date:') !!}
        <p>{{ $event->event_date }}</p>
    </div>

    <!-- Event Cost Field -->
    <div class="form-group col-4">
        {!! Form::label('event_cost', 'Event Cost:') !!}
        <p>{{ $event->event_cost }}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-4">
        {!! Form::label('medical_representative', 'Medical Representative:') !!}
        <p>{{ $event->user->name }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $event->created_at }}</p>
    </div>

</div>
@endif

<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Materials#
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- event Materials Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('user_id', 'Materials:') !!}
                        {!! Form::select('event_material_id',$eventMaterials, null, ['class' => 'form-control','id'=>'event_material_id']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('medical_representative', 'Count :') !!}
                        {!! Form::number('count', null, ['class' => 'form-control','id'=>'event_material_count']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <button id="add-event-material" type="button" class="btn btn-success ">Add</button>

                    </div>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-6">Item</th>
                    <th class="col-4">Count</th>
                    <th class="col-2">Action</th>
                  </tr>
                </thead>
                <tbody id="material-body">
                    @foreach ($event->materials as $key=> $material)
                        <tr>
                            <th class='col-2'  scope='row'>{{$key}}</th>
                            <td class='col-6' >{{$material->name}}</td>
                            <td class='col-4' >{{$material->pivot->count}}</td>
                            <td class='col-2' ><button onclick="onDelete({{$material->id}})" type='button' class='btn btn-danger'>Delete</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Speakers #
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <!-- event Materials Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('user_id', 'Speaker:') !!}
                        {!! Form::select('speaker_id',$speakers, null, ['class' => 'form-control','id'=>'speaker_id']) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        {!! Form::label('medical_representative', 'Count :') !!}
                        {!! Form::number('count', null, ['class' => 'form-control','id'=>'speaker_count']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('medical_representative', 'Note :') !!}
                        {!! Form::text('note', null, ['class' => 'form-control','id'=>'speaker_note']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <button id="add-speakers" type="button" class="btn btn-success ">Add</button>

                    </div>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-2">#</th>
                    <th class="col-2">Item</th>
                    <th class="col-2">Count</th>
                    <th class="col-4">Note</th>
                    <th class="col-2">Action</th>
                  </tr>
                </thead>
                <tbody id="speaker-body">
                    @foreach ($event->speakers as $key=> $speaker)
                        <tr>
                            <td class='col-2' >{{$key}}</th>
                            <td class='col-2' >{{$speaker->name}}</td>
                            <td class='col-2' >{{$speaker->pivot->count}}</td>
                            <td class='col-4' >{{$speaker->pivot->note}}</td>

                            <td class='col-2' ><button onclick="onDeleteSpeaker({{$speaker->id}})" type='button' class='btn btn-danger'>Delete</button></td>
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
        var add_materials_url=@json(route('addMaterials'));
        var remove_materials_url=@json(route('removeMaterials'));
        var add_speaker_url=@json(route('addSpeakers'));
        var remove_speaker_url=@json(route('removeSpeakers'));
        var eventId =@json($event->id);
        $('#add-event-material').on('click', function(){
            var material_id = $('#event_material_id').val();
            var count = $('#event_material_count').val();
            var data={
            "_token": "{{ csrf_token() }}",
                'material_id':material_id,
                'count':count,
                'event_id':eventId
            };
            if ($.trim(count) != '' || count != 0){
            $.post(add_materials_url, data, function(data){
            $('#material-body').empty()
            data.forEach((element,index) => {
                var row = createTRMaterial(element,index);
                $("#material-body").append(row);
                });
            });
            };
        });
        function onDelete(material_id) {
            console.log(material_id);
            var material_id = material_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'material_id':material_id,
                'event_id':eventId
            };
            $.post(remove_materials_url, data, function(data){
                $('#material-body').empty()
                data.forEach((element,index) => {
                    var row = createTRMaterial(element,index);
                    $("#material-body").append(row);
                });
                });
        }
        function createTRMaterial(element,index) {
            return $(" <tr><th class='col-2'  scope='row'>"+index+"</th><td class='col-6' >"+element.name+"</td><td class='col-4' >"+element.pivot.count+"</td><td class='col-2' ><button onclick='onDelete("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td></tr>");
        }

        $('#add-speakers').on('click', function(){
            var speaker_id = $('#speaker_id').val();
            var count = $('#speaker_count').val();
            var note = $('#speaker_note').val();

            var data={
            "_token": "{{ csrf_token() }}",
                'speaker_id':speaker_id,
                'note':note,
                'count':count,
                'event_id':eventId
            };
            if ($.trim(count) != '' || count != 0){
            $.post(add_speaker_url, data, function(data){
            $('#speaker-body').empty()
            data.forEach((element,index) => {
                var row = createTRSpeakers(element,index);
                $("#speaker-body").append(row);
                });
            });
            };
        });
        function onDeleteSpeaker(speaker_id) {
            var speaker_id = speaker_id;
            var data={
            "_token": "{{ csrf_token() }}",
                'speaker_id':speaker_id,
                'event_id':eventId
            };
            $.post(remove_speaker_url, data, function(data){
                $('#speaker-body').empty()
                data.forEach((element,index) => {
                    var row = createTRSpeakers(element,index);
                    $("#speaker-body").append(row);
                });
                });
        }
        function createTRSpeakers(element,index) {
            return $(" <tr><th class='col-2'  scope='row'>"+index+"</th><td class='col-2' >"+element.name+"</td><td class='col-2' >"+element.pivot.count+"</td><td class='col-4' >"+element.pivot.note+"</td><td class='col-2' ><button onclick='onDeleteSpeaker("+element.id+")' type='button' class='btn btn-danger'>Delete</button></td></tr>");
        }
</script>
@endpush
