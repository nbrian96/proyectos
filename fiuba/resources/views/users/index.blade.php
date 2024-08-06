@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @if (session('info'))
		<div class="alert alert-success" id="alertSuccess">
			<strong>{{session('info')}}</strong>
		</div>
	@endif
    <livewire:users-index />
@stop