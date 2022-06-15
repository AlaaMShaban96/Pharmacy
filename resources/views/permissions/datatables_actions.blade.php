{{-- {!! Form::open(['route' => ['permissions.destroy', $id], 'method' => 'delete']) !!} --}}
<div class='btn-group'>
    {{-- <a href="{{ route('permissions.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('permissions.edit', $id) }}" class='btn btn-ghost-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} --}}
    <label class="custom-switch mt-2">
        <input type="checkbox" {{in_array($permission->id,$rolePermissions)?'checked':''}} onclick="getMessage({{$role->id}},{{$permission->id}})" name="custom-switch-checkbox" class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
      </label>
</div>
{{-- {!! Form::close() !!} --}}
