<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\nuevosalumnos;//importé el model de nuevosalumnos
use Illuminate\Support\Facades\Hash;

class NuevosalumnosController extends Controller
{
    public function store(Request $request)
    {//validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:30',
            'email' => 'required|string|email|max:50|unique:nuevosalumnos',
            'password' => 'required|string|min:8|confirmed',
            'colegio' => 'required|string|max:100',
            'anio_graduacion' => 'required|integer',
            'curso' => 'string|max:100',
            'rol_id' => 'integer',
        ]);

        //inserción en la base de datos
        $alumno = new NuevosAlumnos([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'colegio' => $request->colegio,
            'anio_graduacion' => $request->anio_graduacion,
            'curso' => $request->curso,
            'rol_id' => $request->rol_id,
        ]);

        $alumno->save();
         
       
        //redirección al formulario registro con un mensaje de éxito
         return redirect('/registro')->with('success', 'Usuario registrado exitosamente.');
        
    }

    //métodos para buscar y buscarResultados de los alumnos
    public function buscar()
{
    return view('buscar');
}

public function buscarResultados(Request $request)
{
    $query = NuevosAlumnos::query();

    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%' . $request->nombre . '%');
    }

    if ($request->filled('colegio')) {
        $query->where('colegio', 'like', '%' . $request->colegio . '%');
    }

    if ($request->filled('curso')) {
        $query->where('curso', 'like', '%' . $request->curso . '%');
    }

    if ($request->filled('anio_graduacion')) {
        $query->where('anio_graduacion', $request->anio_graduacion);
    }

    $resultados = $query->get();

    return view('resultados', compact('resultados'));
}
}
