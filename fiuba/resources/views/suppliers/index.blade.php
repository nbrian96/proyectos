@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Listado de Proveedores</h1>
@stop

@section('content')
    <livewire:suppliers-index />
@stop
