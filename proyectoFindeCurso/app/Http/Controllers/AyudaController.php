<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AyudaController extends Controller
{
    public function index()

{

        $inscripciones=DB::table('inscripcion')->get();
                
        return view ('edicion',['inscripcion'=>$inscripcion]);

        //esto lo añadí hoy 16/05
    //Método para mostrar todos los registros creo que viene a ser igual que lo de arriba
        //$inscripciones = Inscripcion::all();
        //return view('inscripciones.index', compact('inscripciones'));

    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('inscripciones.create');
    }
   
    // Método para guardar un nuevo registro
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            // Agrega aquí las reglas de validación para los demás campos
        ]);

        // Crea un nuevo registro en la base de datos
        Inscripcion::create($request->all());

        return redirect()->route('inscripcion.index')
                         ->with('success', 'Inscripción creada exitosamente.');
    }

    // Método para mostrar un registro específico
    public function show($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripciones.show', compact('inscripcion'));
    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripciones.edit', compact('inscripcion'));
    }

    // Método para actualizar un registro
    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            // Agrega aquí las reglas de validación para los demás campos
        ]);

        // Actualiza el registro en la base de datos
        Inscripcion::findOrFail($id)->update($request->all());

        return redirect()->route('inscripciones.index')
                         ->with('success', 'Inscripción actualizada exitosamente.');
    }

    // Método para eliminar un registro
    public function destroy($id)
    {
        // Elimina el registro de la base de datos
        Inscripcion::findOrFail($id)->delete();

        return redirect()->route('inscripciones.index')
                         ->with('success', 'Inscripción eliminada exitosamente.');
    }
    
    
}
    