<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Nuevosalumnos;
use App\Models\Task;

class MensajeController extends Controller
{
    public function index()
    {
        // Obtener todos los mensajes donde el usuario autenticado
        // sea el emisor o el receptor.
        $usuarioId = auth()->id();

        // Obtener mensajes donde el usuario es emisor o receptor
        $mensajes = Mensaje::where('emisor_id', $usuarioId)
                    ->orWhere('receptor_id', $usuarioId)
                    ->latest()//muestra primero el último mensaje
                    ->paginate(5);//muestra los mensajes de 5 en 5 en el paginador
    
        return view('dashboard', compact('mensajes'));//cambiemos el nombre de la vista a dashboard de index

    }

    public function create()
    {
        return view('mensajes.create');
    }
 
    public function store(Request $request)
{
    $request->validate([
        'nombre_emisor' => 'required|exists:nuevosalumnos,nombre',
        'nombre_receptor' => 'required|exists:nuevosalumnos,nombre',
        'contenido' => 'required|string|max:1000',
    ]);

    $emisor = Nuevosalumnos::where('nombre', $request->nombre_emisor)->first();
    $receptor = Nuevosalumnos::where('nombre', $request->nombre_receptor)->first();
    //crear un mensaje
    Mensaje::create([
        'emisor_id' => $emisor->id,
        'receptor_id' => $receptor->id,
        'contenido' => $request->contenido,
    ]);
    // Crear una tarea para los administradores indicando que se ha enviado un nuevo mensaje
    Task::create([
        'title' => 'Nuevo mensaje enviado',
        'description' => "El usuario {$emisor->nombre} ha enviado un mensaje a {$receptor->nombre}.",
        'due_date' => now()->addDays(7), // Fecha de vencimiento opcional
        'status' => 'Pendiente', // Ajustar el estado inicial de la tarea
    ]);
    return redirect()->route('mensajes.index')->with('success', 'Mensaje enviado correctamente.');
}


    public function show($id)
    {
        $mensaje = Mensaje::with(['emisor', 'receptor'])->findOrFail($id);
        //con with carga los datos de los alumnos que enviaron y recibieron mensajes
        //evitando consultas innecesarias en la vista
        return view('mensajes.show', compact('mensaje'));
    }

}
