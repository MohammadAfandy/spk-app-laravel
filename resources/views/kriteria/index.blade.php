@extends('app')

@section('title', 'Kriteria')

@section('content_header')
Kriteria
@stop

@section('content')

<div class="row" style="margin-bottom:20px;">
    <div class="col-md-4">
        {!! Form::select('id_spk', $list_spk, $spk_id, ['placeholder' => '-- Pilih SPK --', 'class' => 'form-control pilih-parent']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if (!empty($kriterias))
            {{ link_to_route('kriteria.create', 'Tambah Kriteria', ['id_spk' => $spk_id], ['class'=>'btn btn-primary']) }}
            {!! Form::button('Set Bobot', ['class' => 'btn btn-success', 'data-toggle' => 'modal', 'data-target' => '#modal-bobot']) !!}
            <br><br>
            <table class="table table-bordered table-hover dataTable" id="kriteria-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Tipe</th>
                        <th>Bobot</th>
                        <th>Sub Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        @endif
    </div>
</div>

@include('kriteria._modal_bobot')

@include('kriteria._modal_sub_kriteria')

@stop

@section('js')
<script>
    $(document).ready(function() {
        $("#kriteria-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable.kriteria') !!}' + '?id_spk=<?= request()->get('id_spk') ?>',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'nama', name: 'nama' },
                { data: 'tipe', name: 'tipe' },
                { data: 'bobot', name: 'bobot' },
                { data: 'sub_kriteria_detail', name: 'sub_kriteria_detail', orderable: false },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });
        
        $(".pilih-parent").on("change", function() {
            window.location.href = '{!! route('kriteria.index') !!}' + '?id_spk=' + $(this).val();
        });

        $("#form-set-bobot").on('submit', function(e) {
            e.preventDefault();
            var that = $(this);
            that.find(".error-message").html("").hide();

            $.ajax({
                type: "POST",
                url: that.attr("action"),
                data: that.serialize(),
                success: function(data) {
                    alert("Set Bobot Sukses");
                    $('#modal-bobot').modal('hide');
                    $('#kriteria-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        var errText = "<ul>";
                        Object.keys(errors).forEach(function(k) {
                            errText += "<li>" + errors[k] + "</li>";
                        });
                        errText += "</ul>";
                        that.find(".error-message").html(errText).show();
                    }
                }
            });
        });

        $(document).on("click", ".btn-sub-kriteria", function(e) {
            e.preventDefault();
            var href = $(this).data('href');
            $("#modal-sub-kriteria")
                .attr("data-href", href)
                .modal("show")
                .find(".modal-body")
                .empty()
                .load(href, function() { 
                    checkSubKriteria(); 
                });
        })

        var count_sub = 0;

        $(document).on("click", "#btn-tambah-sub", function() {
            var cek = checkSubKriteria();

            if (false === cek) {
                alert('Max 10 Sub Kriteria');
                return;
            }

            $("#sub-kriteria-detail").append(`
                <tr>
                    <td>` + (cek + 1)  + `</td>
                    <td>{!! Form::text('sub_kriteria_new[{i}][nama]') !!}</td>
                    <td>{!! Form::text('sub_kriteria_new[{i}][nilai]') !!}</td>
                    <td>{!! Form::button('<i class="fa fa-minus"></i>', ['class' => 'btn btn-sm btn-danger btn-minus-sub']) !!}</td>
                </tr>
            `.replace(/{i}/g, count_sub));
            $("#sub-kriteria-detail tr:last-child").hide().fadeIn(300, function() {
                count_sub++;
                checkSubKriteria();
            });
        });

        $('#modal-sub-kriteria').on('hidden.bs.modal', function () {
            count_sub = 0;
        });

        $(document).on("click", ".btn-minus-sub", function() {
            $(this).closest("tr").fadeOut(300, function() {
                $(this).remove()
                $("#sub-kriteria-detail tr").each(function(i) {
                    $(this).find('td:eq(0)').html("<td>" + (i + 1) + "</td>")
                });
                checkSubKriteria();
            });
        });

        function checkSubKriteria() {
            var submit_kriteria = $("#form-sub-kriteria input[type=submit]");
            var length = $("#sub-kriteria-detail tr").length;

            if (length >= 1) {
                submit_kriteria.show();
            } else {
                submit_kriteria.hide();
            }

            if (length >= 10) {
                return false;
            }

            return length;
        }

        $("#form-sub-kriteria").on('submit', function(e) {
            e.preventDefault();
            var that = $(this);
            that.find(".error-message").html("").hide();

            $.ajax({
                type: "POST",
                url: that.attr("action"),
                data: that.serialize(),
                success: function(data) {
                    alert("Set Sub Kriteria Sukses");

                    var url = 'subKriteria/' + data.id + '/form';
                    $("#modal-sub-kriteria").find(".modal-body").empty().load(url);
                    $('#kriteria-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        var errText = "<ul>";
                        Object.keys(errors).forEach(function(k) {
                            errText += "<li>" + errors[k] + "</li>";
                        });
                        errText += "</ul>";
                        that.find(".error-message").html(errText).show();
                    }
                }
            });
        });
    });
</script>
@stop