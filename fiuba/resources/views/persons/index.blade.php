@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    <h1>Listado de Personas</h1>
@stop

@section('content')
    <livewire:persons-index />
@stop
