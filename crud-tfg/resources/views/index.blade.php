@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white mb-4">Busca a tus amigos</h2>
        </div>
        <div class="d-flex mb-4">
            <a href="{{ route('tasks.create') }}" class="btn btn-success mr-5 custom-spacing">Crear Tarea</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-5">Volver al Perfil</a>
        </div>

    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}<br>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            {{-- Iterar sobre todas las tareas de manera individual, para que salgan cada vez --}}
            @foreach ($tasks as $task)
            <tr>
                {{-- aqui cambie los datos de prueba por la variable task y sus datos --}}
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    {{$task->due_date}}
                </td>
                <td>
                    {{-- <span class="badge bg-warning fs-6"> --}}
                    <span class="badge fs-6
                        @if($task->status == 'Completada') bg-success text-white 
                        @elseif($task->status == 'En progreso') bg-primary text-white 
                        @elseif($task->status == 'Pendiente') bg-danger text-white 
                        @endif">
                    
                        {{$task->status}}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Editar</a>


                    <form action="{{route('tasks.destroy', $task)}}" method="POST" class="d-inline">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{-- Aqui le añadí al index el paginador de bootstrap con tres páginas indexadas --}}
        {{$tasks->links()}}
    </div>
    <style>
        /* estilo para los botones del principio */
.custom-spacing {
    margin-right: 20px; 
}
    </style>
</div>
@endsection