@extends('layouts.base')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                {{-- Nombre del perfil del alumno --}}
                <h1 class="m-0 font-weight-bold">Perfil de {{ Auth::user()->nombre }}</h1>
                {{-- Botón de actualizar datos --}}
                <a href="{{ route('nuevosalumnos.edit', Auth::user()->id) }}" class="btn btn-warning me-2">Actualizar Datos</a>
                {{-- mensaje de exito si ha sido correcta la actualización --}}
                @if (Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                @endif
                {{-- Botón de logout (en rojo) --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            </div>
            <div class="card-body bg-light text-dark">
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Colegio:</strong> {{ Auth::user()->colegio }}</p>
                <p><strong>Curso:</strong> {{ Auth::user()->curso }}</p>
                <p><strong>Año de Graduación:</strong> {{ Auth::user()->anio_graduacion }}</p>
            </div>
        </div>
    </div>
    {{-- 🔍 Sección de búsqueda de amigos --}}
    <div class="container mt-4">
        <h2 class="text-primary font-weight-bold">🔍 Buscar amigos</h2>
        <p>En este apartado puede buscar a tus compañeros: por nombre, colegio, años de graduación, etc. Una vez que sepas
            sus datos, podrás ponerte en contacto con ellos escribiéndoles un mensaje.</p>
        {{-- Botón para acceder a la función de búsqueda --}}
        <a href="{{ route('buscar') }}" class="btn btn-success btn-lg font-weight-bold">Buscar amigos</a>
    </div>

    {{-- 📩 Sección de Mensajes --}}
    <div class="container mt-4">
        <h2 class="text-danger font-weight-bold">📩 Mensajes con tus contactos</h2>
        {{-- //verifica si la variable mensajes está definida --}}
        @isset($mensajes)
            @if ($mensajes->isEmpty())
                <p class="alert alert-warning">No tienes mensajes aún.</p>
            @else
                <div class="row">
                    @foreach ($mensajes as $mensaje)
                        <div class="col-md-6">
                            <div
                                class="card mb-3 shadow-sm 
                        {{-- Si el usuario autenticado es el emisor del mensaje, la tarjeta tendrá un fondo azul. si es el receptor será de fondo gris --}}
                            @if ($mensaje->emisor_id == auth()->id()) bg-lightblue @else bg-lightgray @endif">
                                {{-- Cabecera de la tarjeta: muestra el contenido de cada menaje --}}
                                <div class="card-body text-dark rounded p-3">
                                    <h5 class="card-title font-weight-bold">
                                        Mensaje enviado a
                                        @if ($mensaje->emisor_id == auth()->id())
                                            {{-- Si el usuario es el emisor, muestra el nombre del receptor en azul ( text-primary).
                                         Si el usuario es el receptor, muestra el nombre del emisor en verde ( text-success) --}}
                                            <span class="text-primary">{{ $mensaje->receptor->nombre }}</span>
                                        @else
                                            <span class="text-success">{{ $mensaje->emisor->nombre }}</span>
                                        @endif
                                    </h5>
                                    <p class="card-text font-weight-bold">{{ $mensaje->contenido }}</p>
                                    <p class="text-muted small font-weight-bold">
                                        📅 {{ $mensaje->created_at->format('d/m/Y H:i') }}
                                    </p>
                                    {{-- Redirige al detalle de la conversación en mensajes.show --}}
                                    <a href="{{ route('mensajes.show', $mensaje->id) }}" class="btn btn-primary btn-sm">
                                        Ver conversación
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- funcionalidad de las tareas si el usuario es admin --}}
                    @if (Auth::user()->rol_id == 2) <!-- Si el usuario es administrador -->
                        <h2>Tareas</h2>
                        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg" role="button">Ver tareas</a>
                    @else
                        <p class="alert alert-warning">Usuario sin privilegios de admin, sin tareas.</p>
                    @endif
                </div>
      
                {{ $mensajes->links() }} <!-- Agregamos paginación -->
            @endif
        @else
            <p class="text-danger">⚠ Error: No se han podido cargar los mensajes.</p>
        @endisset
    </div>

    {{-- Estilos personalizados para mejorar contraste --}}
    <style>
        .bg-lightblue {
            background-color: #cfe2ff !important;
        }

        /* Azul más oscuro para mejorar visibilidad */
        .bg-lightgray {
            background-color: #e9ecef !important;
        }

        /* Gris más oscuro para mejorar contraste */
        .text-dark {
            color: #212529 !important;
        }

        /* Asegura texto oscuro en fondos claros */
        .font-weight-bold {
            font-weight: bold !important;
        }

        /* EStilo para el botón de las tareas */
       
        .btn-primary.btn-lg {
            transition: transform 0.2s;
        }

        .btn-primary.btn-lg:hover {
            transform: scale(1.05);
        }
    </style>

@endsection
