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
                    <h3>Formulario de Registro</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            @error('name')
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

                        <!-- Imagen de Perfil -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Imagen de perfil</label>
                            <input id="profile_image" type="file" class="form-control" name="profile_image" accept="image/*" required>
                            @error('profile_image')
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

                        <!-- Botón de Registro y Acceso -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('login') }}" class="text-primary text-decoration-underline">
                                ¿Ya estás registrado? Inicia sesión aquí
                            </a>
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
@endsection