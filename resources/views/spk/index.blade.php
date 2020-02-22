@extends('app')

@section('title', 'SPK')

@section('content_header')
SPK
@stop

@section('content')
{{ link_to_route('spk.create', 'Tambah SPK', [], ['class'=>'btn btn-primary']) }}
<br><br><br>
<table class="table table-bordered table-hover dataTable" id="spk-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama SPK</th>
            <th>Jenis Bobot</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $("#spk-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable.spk') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'nama', name: 'nama' },
                { data: 'jenis_bobot', name: 'jenis_bobot' },
                { data: 'ket', name: 'ket' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });

        $(document).on("click", ".btn-delete", function() {
			if (!confirm("Apakah Anda Yakin Ingin Menghapus Data ?")) {
				return false;
			}
		});
    });
</script>
@stop