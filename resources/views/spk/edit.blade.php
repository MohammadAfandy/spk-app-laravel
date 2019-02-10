@extends('app')

@section('title', 'Edit SPK')

@section('content_header')
Edit SPK
@stop

@section('content')

@include('errors._form_error')

{!! Form::model($spk, ['route' => ['spk.update', $spk->id], 'method' => 'PATCH']) !!}
	@include('spk._form', ['submit_text' => 'Update Data'])
{!! Form::close() !!}

@stop