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
     <!-- Formulario para crear un nuevo mensaje -->
    <form method="POST" action="{{ route('mensajes.store') }}">
        @csrf
        {{-- Campo para el nombre del emisor ---como me daba error al enviar el mensaje xq no podía estar el campo vacío del emisor_id... --}}
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Emisor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>

          <!-- Campo para el ID del emisor -->
        <div class="mb-3">
            <label for="emisor_id" class="form-label">ID del Emisor</label>
            <input type="text" class="form-control" id="emisor_id" name="emisor_id" required>
          
        <!-- Campo para el nombre del receptor -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Receptor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

         <!-- Campo para el ID del receptor -->
        <div class="mb-3">
            <label for="receptor_id" class="form-label">ID del Receptor</label>
            <input type="text" class="form-control" id="receptor_id" name="receptor_id" required>
        </div>

        <!-- Campo para el contenido del mensaje -->
        <div class="mb-3">
            <label for="contenido" class="form-label">Mensaje</label>
            <textarea class="form-control" id="contenido" rows="3" name="contenido" required></textarea>
        </div>

         <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection