@extends('app')

@section('title', 'Tambah Kriteria')

@section('content_header')
Tambah Kriteria
@stop

@section('content')

@include('errors._form_error')

{!! Form::open(['route' => 'kriteria.store']) !!}
    @include('kriteria._form', ['submit_text' => 'Tambah Data', 'tipe' => $tipe])
{!! Form::close() !!}

@stop