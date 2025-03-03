@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <!-- Enlace a la página principal -->
    <div class="text-center mb-4">
        <a href="{{ url('/home') }}" class="text-decoration-none">
            <div style="display: inline-block; background-color: white; padding: 10px; border-radius: 50%;">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home" width="40" height="40" style="vertical-align: middle;">
            </div>
            <p class="text-white mt-2">Inicio</p>
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light">
                <div class="card-header text-center bg-primary text-white">
                    <h3>{{ $alumno ? 'Editar Datos del Alumno' : 'Formulario de Registro de Nuevos Alumnos' }}</h3>
                </div>
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        {{-- En todos los input si se actualizan los datos, se mantiene en pantalla lo que ya está guardado --}}
                    <form method="POST" action="{{ $alumno ? route('nuevosalumnos.update', $alumno->id) : route('nuevosalumnos.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($alumno)
                            @method('PUT') <!-- Método PUT para edición -->
                        @endif
                        {{-- Precarga de datos: Si se está editando, los campos se llenan automáticamente 
                        con los datos del alumno. Si es un registro, los campos están vacíos --}}
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre', $alumno ? $alumno->nombre : '') }}" required>
                            @error('nombre')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Colegio -->
                        <div class="mb-3">
                            <label for="colegio" class="form-label">Colegio/Instituto</label>
                            <input id="colegio" type="text" class="form-control" name="colegio" value="{{ old('colegio', $alumno ? $alumno->colegio : '') }}" required>
                            @error('colegio')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Año de Graduación -->
                        <div class="mb-3">
                            <label for="anio_graduacion" class="form-label">Año de graduación</label>
                            <input id="anio_graduacion" type="number" class="form-control" name="anio_graduacion" value="{{ old('anio_graduacion', $alumno ? $alumno->anio_graduacion : '') }}" required>
                            @error('anio_graduacion')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Curso -->
                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <input id="curso" type="text" class="form-control" name="curso" value="{{ old('curso', $alumno ? $alumno->curso : '') }}" required>
                            @error('curso')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $alumno ? $alumno->email : '') }}" required>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña (se muestra solo para registro, no para update) -->
                        @if (!$alumno)
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <!-- Rol ID -->
                        <div class="mb-3">
                            <label for="rol_id" class="form-label">Rol ID</label>
                            <input id="rol_id" type="number" class="form-control" name="rol_id" value="{{ old('rol_id', $alumno ? $alumno->rol_id : '') }}" required>
                            <p class="small">1: Alumno, 2: Administrador</p>
                            @error('rol_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de envío -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ $alumno ? 'Actualizar Alumno' : 'Registrar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- <!-- filepath: /c:/Users/pilip/Herd/crud-tfg/resources/views/registro.blade.php -->
@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <!-- Enlace a la página principal -->
    <div class="text-center mb-4">
        <a href="{{ url('/home') }}" class="text-decoration-none">
            <div style="display: inline-block; background-color: white; padding: 10px; border-radius: 50%;">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home" width="40" height="40" style="vertical-align: middle;">
            </div>
            <p class="text-white mt-2">Inicio</p>
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Formulario de Registro de Nuevos Alumnos</h3>
                </div>
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('nuevosalumnos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Colegio -->
                        <div class="mb-3">
                            <label for="colegio" class="form-label">Colegio/Instituto</label>
                            <input id="colegio" type="text" class="form-control" name="colegio" value="{{ old('colegio') }}" required>
                            @error('colegio')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Año de Graduación -->
                        <div class="mb-3">
                            <label for="anio_graduacion" class="form-label">Año de graduación</label>
                            <input id="anio_graduacion" type="number" class="form-control" name="anio_graduacion" value="{{ old('anio_graduacion') }}" required>
                            @error('anio_graduacion')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Curso -->
                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <input id="curso" type="text" class="form-control" name="curso" value="{{ old('curso') }}" required>
                            @error('curso')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @error('password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            @error('password_confirmation')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Rol ID -->
                        <div class="mb-3">
                            <label for="rol_id" class="form-label">Rol ID</label>
                            <input id="rol_id" type="number" class="form-control" name="rol_id" value="{{ old('rol_id') }}" required>
                            @error('rol_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de Registro -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}