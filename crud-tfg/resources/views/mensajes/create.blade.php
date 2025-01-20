@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <h1>Enviar mensaje</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('mensajes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="NOMBRE" class="form-label">Nombre Receptor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="receptor_id" class="form-label">ID del Receptor</label>
            <input type="text" class="form-control" id="receptor_id" name="receptor_id" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Mensaje</label>
            <textarea class="form-control" id="contenido" rows="3" name="contenido" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection