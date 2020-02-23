@if (isset($kriteria))
    {!! Form::hidden('id', $kriteria->id) !!}
    {!! Form::hidden('spk_id', $kriteria->spk->id) !!}

    <div class="form-group row">
        {!! Form::label('spk', 'Nama SPK :', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('spk', $kriteria->spk->nama, ['class' => 'form-control', 'readonly' => true]) !!}
        </div>
    </div>
@else
    {!! Form::hidden('spk_id', $spk->id) !!}

    <div class="form-group row">
        {!! Form::label('spk', 'Nama SPK :', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('spk', $spk->nama, ['class' => 'form-control', 'readonly' => true]) !!}
        </div>
    </div>
@endif

<div class="form-group row">
    {!! Form::label('nama', 'Nama Kriteria :', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('tipe', 'Tipe :', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('tipe', $tipe, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('ket', 'Keterangan :', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::textArea('ket', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-10">
        {!! Form::submit($submit_text, ['class' => 'btn btn-primary btn-block form-control']) !!}
    </div>
</div>