@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<h1>Lista de Roles</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success" id="alertSuccess">
	<strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
	<div class="card-header">
		<a id="newRol" class="btn btn-primary btn-sm" href="{{route('roles.create')}}">Nuevo Rol</a>
	</div>
	<div class="card-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Rol</th>
					<th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					<td>{{$role->name}}</td>
					<td width="10px">
						<a class="btn btn-secondary btn-sm" href="{{route('roles.edit',$role->id)}}">Editar</a>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer">
	</div>
</div>
@stop