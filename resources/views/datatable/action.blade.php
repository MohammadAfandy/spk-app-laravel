@if ($name == 'kriteria')
    {!! Form::button('<i class="fa fa-book"></i> Sub Kriteria', [
        'class' => 'btn btn-action btn-xs btn-info btn-sub-kriteria',
        'data-id' => $data->id,
        'data-nama' => $data->nama,
        'data-href' => route('subKriteria.form', ['id' => $data->id])
    ]) !!}
    <hr style="margin: 3px">
@endif

<a href="{!! route($name . '.edit', [$data->id]) !!}" class="btn btn-action btn-xs btn-warning">
    <i class="fa fa-pencil"></i> Edit
</a>
<hr style="margin: 3px">
{!! Form::open(['route' => [$name . '.destroy', $data->id], 'method' => 'DELETE']) !!}
    {!! Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-action btn-xs btn-danger', 'type' => 'submit']) !!}
{!! Form::close() !!}