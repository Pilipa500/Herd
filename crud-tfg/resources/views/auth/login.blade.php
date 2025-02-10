@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <!-- Enlace a la página principal -->
        <div class="text-center mb-4">
            <a href="{{ url('/home') }}" class="text-decoration-none">
                <div style="display: inline-block; background-color: white; padding: 10px; border-radius: 50%;">
                    <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home" width="40" height="40"
                        style="vertical-align: middle;">
                </div>
                <p class="text-dark mt-2">Inicio</p>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Estado de la sesión -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Dirección de correo electrónico -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="form-group mt-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Recordarme -->
                    <div class="form-group form-check mt-4">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-between">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-dark" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
