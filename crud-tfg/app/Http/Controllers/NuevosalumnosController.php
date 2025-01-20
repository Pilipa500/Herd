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
}
