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
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
            {{-- <a href="{{ route('mensajes.index') }}" class="btn btn-secondary">Volver a mensajes</a> --}}
        </div>
    </div>
</div>
@endsection
