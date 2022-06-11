<div class="row">

    <div class="col-sm-4">
        {!! Form::label('name', trans('companies.name')) !!}
        {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', trans('companies.phone_number')) !!}
        {!! Form::input('number', 'phone_number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', trans('companies.code')) !!}
        {!! Form::input('code', 'code', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('name', trans('companies.type')) !!}
        {{-- {!! Form::select($name, $list, $selected, [$options]) !!} --}}
        {!! Form::select('type', ['pharmacy'=>trans('companies.pharmacy'), 'event'=>trans('companies.event'),'store'=>trans('companies.store')],$type, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="mt-3 form-group col-sm-12">
        {!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('companies.index',['type'=>$type]) }}" class="btn btn-secondary">@lang('app.cancale')</a>
    </div>
</div>
