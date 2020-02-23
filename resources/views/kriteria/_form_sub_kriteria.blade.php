{!! Form::hidden('kriteria_id', $kriteria->id, ['class' => 'form-control']) !!}

<div class="form-group row">
    {!! Form::label('spk', 'Nama SPK : ' . $kriteria->nama, ['class' => 'col-md-4 col-form-label']) !!}
</div> 
<div class="row">
    <div class="col-md-12">
        {!! Form::button('<i class="fa fa-plus"></i>', ['id' => 'btn-tambah-sub', 'class' => 'btn btn-sm btn-success pull-right']) !!}
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger error-message" style="display: none;"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sub Kriteria</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="sub-kriteria-detail">
                @if (!empty($sub_kriterias))
                    @foreach($sub_kriterias as $sub_kriteria)
                        <tr>
                            <td></td>
                            <td>{!! Form::text('sub_kriteria[' . $sub_kriteria->id . '][nama]', $sub_kriteria->nama) !!}</td>
                            <td>{!! Form::text('sub_kriteria[' . $sub_kriteria->id . '][nilai]', $sub_kriteria->nilai) !!}</td>
                            <td>{!! Form::button('<i class="fa fa-minus"></i>', ['class' => 'btn btn-sm btn-danger btn-minus-sub']) !!}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>