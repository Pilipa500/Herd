@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <h1>Mensajes</h1>
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
         <!-- Muestra un mensaje de éxito almacenado en la sesión -->
        </div>
</div>
 <!-- Cierra una estructura de control condicional -->
    @endif
    <ul class="list-group">
        @foreach ($mensajes as $mensaje)
         <!-- Itera sobre la colección de mensajes -->
            <li class="list-group-item">
                <!-- Crea un enlace a la ruta 'mensajes.show' pasando el ID del mensaje -->
                <a href="{{ route('mensajes.show', $mensaje->id) }}">
                    <!-- Muestra el contenido del mensaje -->
                    {{ $mensaje->contenido }}
                </a>
            </li>      
        @endforeach
         <!-- Finaliza la iteración sobre los mensajes -->
    </ul>
</div> 
@endsection
<!-- Finaliza la sección de contenido de la plantilla -->
    