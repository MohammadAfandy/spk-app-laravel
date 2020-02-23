@extends('app')

@section('title', 'Edit Kriteria')

@section('content_header')
Edit Kriteria
@stop

@section('content')

@include('errors._form_error')

{!! Form::model($kriteria, ['route' => ['kriteria.update', $kriteria->id], 'method' => 'PATCH']) !!}
	@include('kriteria._form', ['submit_text' => 'Update Data'])
{!! Form::close() !!}

@stop