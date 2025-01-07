<!-- filepath: /c:/Users/pilip/Herd/crud-tfg/resources/views/usuarios/index.blade.php -->
@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Listado de Usuarios</h2>
        </div>
        <div>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{ Session::get('success') }}</strong><br>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Colegio</th>
                <th>Curso</th>
                <th>Año de Graduación</th>
                <th>Foto</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->colegio }}</td>
                <td>{{ $usuario->curso }}</td>
                <td>{{ $usuario->anio_graduacion }}</td>
                <td><img src="{{ $usuario->foto }}" alt="Foto de {{ $usuario->nombre }}" width="50"></td>
                <td>{{ $usuario->rol_id }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection