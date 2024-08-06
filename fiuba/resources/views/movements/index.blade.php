@extends('adminlte::page')

@section('title', 'Movimientos')

@section('content_header')
    <h1>Listado de Movimientos</h1>
@stop

@section('content')
    <livewire:movements-index />
@stop
