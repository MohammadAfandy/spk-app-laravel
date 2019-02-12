@extends('app')

@section('title', 'Alternatif')

@section('content_header')
Alternatif
@stop

@section('content')
{{ link_to_route('alternatif.create', 'Tambah Alternatif', [], ['class'=>'btn btn-primary']) }}
@if (!empty($list_alternatif))
    <table class="table table-bordered table-hover dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_alternatif as $key => $alt): ?>
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $alt->nama_alternatif }}</td>
                    <td>{{ !empty($alt->keterangan) ? $alt->keterangan : '-' }}</td>
                    <td>
                        {{ link_to_route('alternatif.edit', 'Edit', [$alt->id], ['class'=>'btn btn-success btn-xs btn-block']) }}
                        <br>
                        {!! Form::open(['route' => ['alternatif.destroy', $alt->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-block btn-delete']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
@else
    <p>Tidak Ada Data Alternatif</p>
@endif

@stop