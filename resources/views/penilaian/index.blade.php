@extends('app')

@section('title', 'Penilaian')

@section('content_header')
Penilaian
@stop

@section('content')

<div class="row" style="margin-bottom:20px;">
    <div class="col-md-4">
        {!! Form::select('id_spk', $list_spk, $spk_id, ['placeholder' => '-- Pilih SPK --', 'class' => 'form-control pilih-parent']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (!empty($spk_id))
            {{ link_to_route('penilaian.create', 'Tambah Penilaian', ['id_spk' => $spk_id], ['class'=>'btn btn-primary']) }}
            @if ($count_penilaian > 0)
                <br><br>
                <table class="table table-bordered table-hover dataTable" id="penilaian-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            @endif
        @endif
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        var columns = [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nama_alternatif', name: 'nama_alternatif' },
        ];
        var thead = $("#penilaian-table thead tr th");
        
        Object.keys(thead).forEach(function(k) {
            if (k > 1) {
                columns.push({
                    data: (thead[k].textContent + '_label').toLowerCase(),
                    name: (thead[k].textContent + '_label').toLowerCase()
                });   
            }
        });

        $("#penilaian-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable.penilaian') !!}' + '?id_spk=<?= request()->get('id_spk') ?>',
            columns: columns
        });
        
        $(".pilih-parent").on("change", function() {
            window.location.href = '{!! route('penilaian.index') !!}' + '?id_spk=' + $(this).val();
        })
    });
</script>
@stop