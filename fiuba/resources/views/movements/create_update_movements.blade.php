@extends('adminlte::page')

@section('title', 'Buqueviajes - Movimientos')

@section('content_header')
<h1>Listado de Movimientos - Buqueviajes</h1>
@stop

@section('content')
<livewire:movements-create :ship_travel="$ship_travel" />
@stop

@section('css')
<style>
    .span-error {
        color: red;
    }

    #col-movement .col-sm-4 {
        padding-top: 1em;
    }

    .classModal {
        padding: 1em;
        margin: 1em;
        background: #dfdfdf;
    }

    #btn_movement {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    #btn_movement button {
        white-space: nowrap;
        width: auto;
        margin-top: .5em;
    }
</style>
@stop