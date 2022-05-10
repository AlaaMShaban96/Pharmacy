
<div class="col-sm-4">
    {!! Form::label('name', 'name:') !!}
    {!! Form::input('string', 'name', null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-4">
    {!! Form::label('name', 'Phone Number:') !!}
    {!! Form::input('number', 'phone_number', null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-4">
    {!! Form::label('name', 'Type:') !!}
    {{-- {!! Form::select($name, $list, $selected, [$options]) !!} --}}
    {!! Form::select('type', ['pharmacy'=>'pharmacy', 'event'=>'event'],$type, ['class' => 'form-control']) !!}
</div>
<br>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index',['type'=>$type]) }}" class="btn btn-secondary">Cancel</a>
</div>
