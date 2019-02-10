@if (isset($spk))
	{!! Form::hidden('id', $spk->id) !!}	
@endif


<div class="form-group row">
	{!! Form::label('nama_spk', 'Nama SPK :', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
		{!! Form::text('nama_spk', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group row">
	{!! Form::label('keterangan', 'Keterangan :', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
		{!! Form::textArea('keterangan', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-10">
		{!! Form::submit($submit_text, ['class' => 'btn btn-primary btn-block form-control']) !!}
	</div>
</div>