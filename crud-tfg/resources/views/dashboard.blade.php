{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Has iniciado la sesión!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.base')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
            {{-- Nombre del perfil del alumno --}}
            <h1 class="m-0">Perfil de {{ Auth::user()->nombre }}</h1>
            {{-- Botón de logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </div>
        <div class="card-body text-dark">
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Colegio:</strong> {{ Auth::user()->colegio }}</p>
            <p><strong>Curso:</strong> {{ Auth::user()->curso }}</p>
            <p><strong>Año de Graduación:</strong> {{ Auth::user()->anio_graduacion }}</p>
        </div>
    </div>
</div>
@endsection

