<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Supplier:') !!}
        {!! Form::text('supplier_name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Event Specialty Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_specialty_id', 'Event Specialty :') !!}
        {!! Form::select('event_specialty_id',$eventSpecialties, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Event Location Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_location_id', 'Event Location :') !!}
        {!! Form::select('event_location_id',$eventLocations,null, ['class' => 'form-control']) !!}
    </div>

    <!-- Event Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_number', 'Event Number:') !!}
        {!! Form::number('event_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Event Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_date', 'Event Date:') !!}
        {!! Form::text('event_date', null, ['class' => 'form-control','id'=>'event_date']) !!}
    </div>
    <!-- Event Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_time', 'Event Time:') !!}
        {!! Form::text('event_time', null, ['class' => 'form-control','id'=>'event_time']) !!}
    </div>



    <!-- Visitors Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('visitors_number', 'Visitors Number:') !!}
        {!! Form::number('visitors_number', null, ['class' => 'form-control']) !!}
    </div>
     <!-- Visitors Number Field -->
     <div class="form-group col-sm-6">
        {!! Form::label('event_cost', 'Event cost:') !!}
        {!! Form::number('event_cost', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Event Food Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_food_location', 'Event Food Location:') !!}
        {!! Form::text('event_food_location', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Event Spicy Food Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_spicy_food_location', 'Event Spicy Food Location:') !!}
        {!! Form::text('event_spicy_food_location', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Event Sweet Food Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_sweet_food_location', 'Event Sweet Food Location:') !!}
        {!! Form::text('event_sweet_food_location', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Media Company Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('media_company_id', 'Media Company :') !!}
        {!! Form::select('media_company_id',$companies, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Decoration Company Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('decoration_company_id', 'Decoration Company :') !!}
        {!! Form::select('decoration_company_id',$companies, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Medical Representative Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('medical_representative', 'Medical Representative:') !!}
        {!! Form::text('medical_representative', null, ['class' => 'form-control']) !!}
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('user_id', 'User:') !!}
        {!! Form::select('user_id',$users, null, ['class' => 'form-control']) !!}
    </div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@push('scripts')
<script type="text/javascript">
        $('#event_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            icons: {
                up: "icon-arrow-up-circle icons font-2xl",
                down: "icon-arrow-down-circle icons font-2xl"
            },
            sideBySide: true
        });
        $('#event_time').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            icons: {
                up: "icon-arrow-up-circle icons font-2xl",
                down: "icon-arrow-down-circle icons font-2xl"
            },
            sideBySide: true
        })


        $('#add-event-material').on('click', function(){
            var material_id = $('#event_material_id').val();
            var count = $('#event_material_count').val();
            var data={
                'material_id':material_id,
                'count':count
            };
            console.log('add-event-material',material_id,count);
            if ($.trim(count) != '' || count != 0){
            $.post('ajax/name.php', data, function(data){
                var obj = jQuery.parseJSON(data);
                console.log(obj);
            });
            };
        });

    </script>
@endpush
