@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>Perfil de {{ Auth::user()->nombre }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Colegio:</strong> {{ Auth::user()->colegio }}</p>
            <p><strong>Curso:</strong> {{ Auth::user()->curso }}</p>
            <p><strong>Año de Graduación:</strong> {{ Auth::user()->anio_graduacion }}</p>
        </div>
    </div>
</div>
@endsection
