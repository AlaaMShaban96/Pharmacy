<div class='btn-group'>

    @if ($order->status=='receive'  ||$order->status=='canceled' )

    @else
        @if ($order->status=='approve')
        {!! Form::open(['route' => ['orderRequests.changeStatus',['id'=>$order->id,'status'=>'approve']], 'method' => 'post']) !!}
            {!! Form::button('<i class="fa fa-thumbs-o-up"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-ghost-success',
                'onclick' => "return confirm('Are you sure?')"
            ]) !!}
        {!! Form::close() !!}

        @else
        {!! Form::open(['route' => ['orderRequests.changeStatus',['id'=>$order->id,'status'=>'canceled']], 'method' => 'post']) !!}
            {!! Form::button('<i class="fa fa-check"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-ghost-success',
                'onclick' => "return confirm('Are you sure?')"
            ]) !!}
        {!! Form::close() !!}

        {!! Form::open(['route' => ['orderRequests.changeStatus',['id'=>$order->id,'status'=>'canceled']], 'method' => 'post']) !!}
            {!! Form::button('<i class="fa fa-ban"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-ghost-danger',
                'onclick' => "return confirm('Are you sure?')"
            ]) !!}
        {!! Form::close() !!}

        @endif
        <a href="{{ route('orderRequests.show', $order->id) }}" class='btn btn-ghost-success'>
            <i class="fa fa-eye"></i>
         </a>
        {!! Form::open(['route' => ['orderRequests.destroy', $order->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-ghost-danger',
                'onclick' => "return confirm('Are you sure?')"
            ]) !!}
        {!! Form::close() !!}
    @endif




</div>
{{-- <a href="{{ route('orderRequests.show', $id) }}" class='btn btn-ghost-success'>
    <i class="fa fa-thumbs-o-up"></i>
 </a> --}}
