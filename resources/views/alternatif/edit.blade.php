@extends('app')

@section('title', 'Edit Alternatif')

@section('content_header')
Edit Alternatif
@stop

@section('content')

@include('errors._form_error')

{!! Form::model($alternatif, ['route' => ['alternatif.update', $alternatif->id], 'method' => 'PATCH']) !!}
	@include('alternatif._form', ['submit_text' => 'Update Data'])
{!! Form::close() !!}

@stop