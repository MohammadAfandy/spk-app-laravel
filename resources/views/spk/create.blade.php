@extends('app')

@section('title', 'Tambah SPK')

@section('content_header')
Tambah SPK
@stop

@section('content')

@include('errors._form_error')

{!! Form::open(['route' => 'spk.store']) !!}
	@include('spk._form', ['submit_text' => 'Tambah Data', 'list_bobot' => $list_bobot])
{!! Form::close() !!}

@stop