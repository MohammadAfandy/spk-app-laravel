@extends('app')

@section('title', 'Tambah Alternatif')

@section('content_header')
Tambah Alternatif
@stop

@section('content')

@include('errors._form_error')

{!! Form::open(['route' => 'alternatif.store']) !!}
	@include('alternatif._form', ['submit_text' => 'Tambah Data'])
{!! Form::close() !!}

@stop