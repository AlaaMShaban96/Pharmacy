{!! Form::open(['route' => ['events.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('events.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('events.edit', $id) }}" class='btn btn-ghost-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger delete-confirm',
        //'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
<script>
    $('.delete-confirm').on('click', function (event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal('Are you sure?', {  dangerMode: true,  buttons: true,})
        .then(function(value) {
                if (value) {
                    form.submit();
                }
            });
        });
</script>
