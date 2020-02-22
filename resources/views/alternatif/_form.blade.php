@if (isset($alternatif))
	{!! Form::hidden('id', $alternatif->id) !!}
    {!! Form::hidden('spk_id', $alternatif->spk->id) !!}

    <div class="form-group row">
        {!! Form::label('spk', 'Nama SPK :', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('spk', $alternatif->spk->nama, ['class' => 'form-control', 'readonly' => true]) !!}
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
	{!! Form::label('nama', 'Nama Alternatif :', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
		{!! Form::text('nama', null, ['class' => 'form-control']) !!}
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