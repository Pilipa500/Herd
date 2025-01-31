@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Buscar Alumnos</h1>
    <form action="{{ route('buscar.resultados') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6 mb-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6 mb-4">
                <label for="colegio">Colegio</label>
                <input type="text" class="form-control" id="colegio" name="colegio" placeholder="Colegio">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 mb-4">
                <label for="curso">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" placeholder="Curso">
            </div>
            <div class="form-group col-md-6 mb-4">
                <label for="anio_graduacion">Año de Graduación</label>
                <input type="number" class="form-control" id="anio_graduacion" name="anio_graduacion" placeholder="Año de Graduación">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-4">Buscar</button>
       
    </form>
</div>
@endsection