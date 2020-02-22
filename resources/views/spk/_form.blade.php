@if (isset($spk))
	{!! Form::hidden('id', $spk->id) !!}	
@endif

<div class="form-group row">
	{!! Form::label('nama', 'Nama SPK :', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
		{!! Form::text('nama', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group row">
	{!! Form::label('jenis_bobot_id', 'Jenis Bobot :', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
		{!! Form::select('jenis_bobot_id', $list_bobot, null, ['class' => 'form-control']) !!}
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