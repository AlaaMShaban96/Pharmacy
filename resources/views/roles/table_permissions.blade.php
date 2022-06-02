<div class="table table-striped table-bordered" >
    <table class="table" id="permissions-table">
        <thead>
            <tr>
                <th colspan="3">Name</th>
                <th colspan="3">Guard</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td colspan="3">{{ $permission->name }}</td>
                <td colspan="3">{{ $permission->guard_name }}</td>
                <td colspan="3">
                    {{-- {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!} --}}
                    <div class='btn-group'>
                            <label class="custom-switch mt-2">
                              <input type="checkbox" {{in_array($permission->id,$rolePermissions)?'checked':''}} onclick="getMessage({{$role->id}},{{$permission->id}})" name="custom-switch-checkbox" class="custom-switch-input">
                              <span class="custom-switch-indicator"></span>
                            </label>
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
