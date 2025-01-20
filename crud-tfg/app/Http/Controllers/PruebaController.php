<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;

class PruebaController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:prueba',
        ]);

        // Inserción en la base de datos
        $registro = Prueba::create($validated);
// Redirige al formulario con un mensaje de éxito
        return redirect('/formulario')->with('mensaje', 'Registro creado con éxito');
    }
}