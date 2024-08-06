@extends('adminlte::page')

@section('title', 'Barcos')

@section('content_header')
    <h1>Listado de Barcos</h1>
@stop

@section('content')
    <livewire:boats-index />
@stop


