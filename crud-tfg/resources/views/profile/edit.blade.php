<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @extends('layouts.base')

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
@endsection --}}

