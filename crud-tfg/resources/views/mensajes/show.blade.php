@extends('layouts.base')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body text-dark">
                <h5 class="card-title">
                    Mensaje de {{ $mensaje->emisor->nombre }} para {{ $mensaje->receptor->nombre }}
                </h5>
                <p class="card-text">{{ $mensaje->contenido }}</p>
                <p class="text-muted small">Enviado el {{ $mensaje->created_at->format('d/m/Y H:i') }}</p>

                {{-- Botón dinámico para volver a la página anterior --}}
                <div class="d-flex mb-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-5">Volver al Perfil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
