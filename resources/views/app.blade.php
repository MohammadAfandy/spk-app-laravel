{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
@stop

@section('content')
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

@section('js')
<script>
	$(document).ready(function() {
		$(".dataTable").dataTable();

		$(".btn-delete").on("click", function() {
			if (!confirm("Apakah Anda Yakin Ingin Menghapus Data ?")) {
				return false;
			}
		});
	});
</script>
@stop