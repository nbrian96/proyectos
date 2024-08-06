@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <form action="{{ route('roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese nombre del Rol" value="{{ old('name', $role->name) }}">
                    
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <h2 class="h3">Lista de permisos</h2>
                    
                    @foreach($permissions as $permission)
                        <div>
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-1" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                    <br>
                    <button type="submit" class="btn btn-primary" id="submitButtonRol">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@stop
