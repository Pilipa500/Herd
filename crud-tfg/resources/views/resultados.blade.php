@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-mark">Resultados de la búsqueda</h1>
    <div class="d-flex mb-4">
       <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-5">Volver al Perfil</a>
    </div>
    @if($resultados->isEmpty())
        <div class="alert alert-warning" role="alert">
            No se encontraron resultados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-primary">Nombre</th>
                        <th class="text-primary">Colegio</th>
                        <th class="text-primary">Curso</th>
                        <th class="text-primary">Año de Graduación</th>
                        <th class="text-primary">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados as $alumno)
                        <tr>
                            <td class='text-white'>{{ $alumno->nombre }}</td>
                            <td class='text-white'>{{ $alumno->colegio }}</td>
                            <td class='text-white'>{{ $alumno->curso }}</td>
                            <td class='text-white'>{{ $alumno->anio_graduacion }}</td>
                            <td>
                                <a href="{{ route('mensajes.create', ['alumno_id' => $alumno->id]) }}" class="btn btn-primary btn-sm">Enviar Mensaje</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <a href="{{ route('buscar') }}" class="btn btn-secondary mt-3">Realizar otra búsqueda</a>
</div>
@endsection