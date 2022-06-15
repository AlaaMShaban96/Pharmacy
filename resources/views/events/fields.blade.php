
@if (auth()->user()->hasRole('Super-Admin') ||auth()->user()->hasRole('Admin-Pro')  )
<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>"Name"]) !!}
    </div>
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('supplier_name', null, ['class' => 'form-control', 'placeholder'=>"Supplier"]) !!}
    </div>
    <!-- Event Specialty Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('event_specialty_id',$eventSpecialties, null, ['class' => 'form-control', 'placeholder'=>"Event Specialty"]) !!}
    </div>

    <!-- Event Location Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('event_location_id',$eventLocations,null, ['class' => 'form-control', 'placeholder'=>"Event Location"]) !!}
    </div>

    <!-- Event Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::number('event_number', null, ['class' => 'form-control', 'placeholder'=>"Event Number"]) !!}
    </div>

    <!-- Event Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('event_date', null, ['class' => 'form-control', 'placeholder'=>"Event Date",'id'=>'event_date']) !!}
    </div>
     <!-- Event Date Field -->
     <div class="form-group col-sm-6">
        {!! Form::text('event_start', null, ['class' => 'form-control', 'placeholder'=>"Event Start",'id'=>'event_start']) !!}
    </div>
     <!-- Event Date Field -->
     <div class="form-group col-sm-6">
        {!! Form::text('event_close', null, ['class' => 'form-control', 'placeholder'=>"Event Close",'id'=>'event_close']) !!}
    </div>
    <!-- Event Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('event_time', null, ['class' => 'form-control', 'placeholder'=>"Event Time",'id'=>'event_time']) !!}
    </div>



    <!-- Visitors Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::number('visitors_number', null, ['class' => 'form-control', 'placeholder'=>"Visitors Number"]) !!}
    </div>
     <!-- Visitors Number Field -->
     <div class="form-group col-sm-6">
        {!! Form::number('event_cost', null, ['class' => 'form-control', 'placeholder'=>"Event cost"]) !!}
    </div>
    <!-- Event Food Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('event_food_location', null, ['class' => 'form-control', 'placeholder'=>"Event Food Location"]) !!}
    </div>

    <!-- Event Spicy Food Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('event_spicy_food_location', null, ['class' => 'form-control', 'placeholder'=>"Event Spicy Food Location"]) !!}
    </div>

    <!-- Event Sweet Food Location Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('event_sweet_food_location', null, ['class' => 'form-control', 'placeholder'=>"Event Sweet Food Location"]) !!}
    </div>

    <!-- Media Company Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('media_company_id',$companies, null, ['class' => 'form-control', 'placeholder'=>"Media Company"]) !!}
    </div>

    <!-- Decoration Company Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('decoration_company_id',$companies, null, ['class' => 'form-control', 'placeholder'=>"Decoration Company"]) !!}
    </div>

    {{-- <!-- Medical Representative Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('medical_representative', 'Medical Representative:') !!}
        {!! Form::text('medical_representative', null, ['class' => 'form-control', 'placeholder'=>"Medical Representative"]) !!}
    </div> --}}

    <!-- User Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('user_id', 'User:') !!}
        {!! Form::select('user_id',$users, null, ['class' => 'form-control', 'placeholder'=>"Medical Representative"]) !!}
    </div>
</div>
@else
<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>"Name"]) !!}
    </div>

    <!-- Event Specialty Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('event_specialty_id',$eventSpecialties, null, ['class' => 'form-control', 'placeholder'=>"Event Specialty"]) !!}
    </div>

    <!-- Event Location Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('event_location_id',$eventLocations,null, ['class' => 'form-control', 'placeholder'=>"Event Location"]) !!}
    </div>


    <!-- Event Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::text('event_date', null, ['class' => 'form-control', 'placeholder'=>"Event Date",'id'=>'event_date']) !!}
    </div>

     <!-- Visitors Number Field -->
     <div class="form-group col-sm-6">
        {!! Form::number('event_cost', null, ['class' => 'form-control', 'placeholder'=>"Event cost"]) !!}
    </div>


    <!-- User Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::select('user_id',$users, null, ['class' => 'form-control', 'placeholder'=>"Medical Representative"]) !!}
    </div>
</div>
@endif


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
        $('#event_start').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            icons: {
                up: "icon-arrow-up-circle icons font-2xl",
                down: "icon-arrow-down-circle icons font-2xl"
            },
            sideBySide: true
        })
        $('#event_close').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
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
