<div class='btn-group'>

    @can('orderRequests.changeStatus')
        @if ($order->status=='receive'  ||$order->status=='canceled' )

        @else
            @if ($order->status=='approve' && !auth()->user()->isDoctor())
            {!! Form::open(['route' => ['orderRequests.changeStatus',['id'=>$order->id,'status'=>'receive']], 'method' => 'post']) !!}
                {!! Form::button('<i class="fa fa-thumbs-o-up"></i>', [
                    'type' => 'submit',
                    'class' => 'btn btn-ghost-success',
                    'onclick' => "return confirm('Are you sure?')"
                ]) !!}
            {!! Form::close() !!}

            @else
                @if ($order->status=='pending')
                    {!! Form::open(['route' => ['orderRequests.changeStatus',['id'=>$order->id,'status'=>'approve']], 'method' => 'post']) !!}
                        {!! Form::button('<i class="fa fa-check"></i>', [
                            'type' => 'submit',
                            'class' => 'btn btn-ghost-success',
                            'onclick' => "return confirm('Are you sure?')"
                        ]) !!}
                    {!! Form::close() !!}
                @endif
                @if (!auth()->user()->isDoctor())


                    {!! Form::open(['route' => ['orderRequests.changeStatus',['id'=>$order->id,'status'=>'canceled']], 'method' => 'post']) !!}
                        {!! Form::button('<i class="fa fa-ban"></i>', [
                            'type' => 'submit',
                            'class' => 'btn btn-ghost-danger',
                            'onclick' => "return confirm('Are you sure?')"
                        ]) !!}
                    {!! Form::close() !!}
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
            @endif

        @endif
    @endcan





</div>
{{-- <a href="{{ route('orderRequests.show', $id) }}" class='btn btn-ghost-success'>
    <i class="fa fa-thumbs-o-up"></i>
 </a> --}}
