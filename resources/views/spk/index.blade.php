@extends('app')

@section('title', 'SPK')

@section('content_header')
SPK
@stop

@section('content')
{{ link_to_route('spk.create', 'Tambah SPK', [], ['class'=>'btn btn-primary']) }}
@if (!empty($list_spk))
    <table class="table table-bordered table-hover dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama SPK</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_spk as $key => $spk): ?>
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $spk->nama_spk }}</td>
                    <td>{{ !empty($spk->keterangan) ? $spk->keterangan : '-' }}</td>
                    <td>
                        {{ link_to_route('spk.edit', 'Edit', [$spk->id], ['class'=>'btn btn-success btn-xs btn-block']) }}
                        <br>
                        {!! Form::open(['route' => ['spk.destroy', $spk->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-block btn-delete']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
@else
    <p>Tidak Ada Data SPK</p>
@endif

@stop