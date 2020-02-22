@extends('app')

@section('title', 'Alternatif')

@section('content_header')
Alternatif
@stop

@section('content')

<div class="row" style="margin-bottom:20px;">
    <div class="col-md-4">
        {!! Form::select('id_spk', $list_spk, $spk_id, ['placeholder' => '-- Pilih SPK --', 'class' => 'form-control pilih-parent']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (!empty($alternatifs))
            {{ link_to_route('alternatif.create', 'Tambah Alternatif', ['id_spk' => $spk_id], ['class'=>'btn btn-primary']) }}
            <br><br>
            <table class="table table-bordered table-hover dataTable" id="alternatif-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th>Nama SPK</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        @endif
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $("#alternatif-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable.alternatif') !!}' + '?id_spk=<?= request()->get('id_spk') ?>',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'nama', name: 'nama' },
                { data: 'nama_spk', name: 'nama_spk' },
                { data: 'ket', name: 'ket' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });
        
        $(".pilih-parent").on("change", function() {
            window.location.href = '{!! route('alternatif.index') !!}' + '?id_spk=' + $(this).val();
        })
    });
</script>
@stop