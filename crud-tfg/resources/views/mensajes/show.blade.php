@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <h1>Mensaje</h1>
        <div class="mb-3">
            <p><strong>De: </strong> {{ $mensaje->emisor_id }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Para: </strong> {{ $mensaje->receptor_id }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Contenido: </strong> {{ $mensaje->contenido }}</p>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('mensajes.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
