@extends('layouts.base')

@section('content')
    <!-- Enlace a la página principal -->
    <div class="text-center mb-4">
        <a href="{{ url('/home') }}" class="text-decoration-none">
            <div style="display: inline-block; background-color: white; padding: 10px; border-radius: 50%;">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home" width="40" height="40"
                    style="vertical-align: middle;">
            </div>
            <p class="text-white mt-2">Inicio</p>
        </a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-dark bg-light">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>Registro de Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="password_confirmation">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="colegio">Colegio:</label>
                                <input type="text" class="form-control" id="colegio" name="colegio" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="graduacion">Año de Graduación:</label>
                                <input type="number" class="form-control" id="graduacion" name="graduacion" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="profile_image">Foto de Perfil:</label>
                                <input type="file" class="form-control" id="profile_image" name="profile_image" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" form="register" class="btn btn-lg btn-success" style="padding: 10px 20px; font-size: 1.2rem;">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
