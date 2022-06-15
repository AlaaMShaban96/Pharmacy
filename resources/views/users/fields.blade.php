<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {{-- {!! Form::label('name', 'Name:') !!} --}}
        {!! Form::text('name', null, ['class' => 'form-control' ,'placeholder'=>'Name']) !!}
    </div>
    <!-- email Field -->
    <div class="form-group col-sm-6">
        {{-- {!! Form::label('name', 'email:') !!} --}}
        {!! Form::email('email', null, ['class' => 'form-control','placeholder'=>'Email']) !!}
    </div>
    <!-- mobile Field -->
    <div class="form-group col-sm-6">
        {{-- {!! Form::label('name', 'mobile:') !!} --}}
        {!! Form::number('mobile', null, ['class' => 'form-control','placeholder'=>'Mobile','required'=>true]) !!}
    </div>

    @hasrole('Super-Admin')
    <div class="form-group col-sm-6">
        {{-- {!! Form::label('name', 'Role:') !!} --}}
        {!! Form::select('role_id', $roles,null, ['class' => 'form-control','placeholder'=>'Role']) !!}
    </div>
    @else
    @endhasrole
 <!-- role Field -->
    <!-- department Field -->
    <div class="form-group col-sm-6">
        {{-- {!! Form::label('name', 'department:') !!} --}}
        {!! Form::select('department_id', $departments,null, ['class' => 'form-control','placeholder'=>'Department']) !!}
    </div>
    <div class="form-group col-sm-6">
        {{-- {!! Form::label('password', 'password:') !!} --}}
        {!! Form::password('password', ['class' => 'form-control','placeholder'=>'password']) !!}
    </div>
    <div class="form-group col-sm-6 custom-file">
        <input type="file" name="files" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Photo</label>
      </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
