{{ link_to_route($name . '.edit', 'Edit', [$data->id], ['class'=>'btn btn-success btn-xs btn-block']) }}
{!! Form::open(['route' => [$name . '.destroy', $data->id], 'method' => 'DELETE']) !!}
    {{ csrf_field() }}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-block btn-delete']) !!}
{!! Form::close() !!}