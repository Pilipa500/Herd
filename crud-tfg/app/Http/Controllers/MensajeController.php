<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Nuevosalumnos;

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
    //anulé este después de actualizar el formulario de creación de mensajes, solo x nombres no con id
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         //'emisor_id' => 'required|exists:nuevosalumnos,id',
    //         'receptor_id' => 'required|exists:nuevosalumnos,id',
    //         'contenido' => 'required|string|max:1000',
    //     ]);

    //     Mensaje::create([
    //         'emisor_id' => auth()->id(),// Asegura que el usuario autenticado es el emisor (es más seguro)
    //         //'emisor_id' => $request->emisor_id,//este es el nuevo campo para obtener el id del emisor_id del formularionb de creación de mensajes
    //         'receptor_id' => $request->receptor_id,
    //         'contenido' => $request->contenido,
    //     ]);

    //     return redirect()->route('mensajes.index')->with('success', 'Mensaje enviado correctamente.');
    // }
    public function store(Request $request)
{
    $request->validate([
        'nombre_emisor' => 'required|exists:nuevosalumnos,nombre',
        'nombre_receptor' => 'required|exists:nuevosalumnos,nombre',
        'contenido' => 'required|string|max:1000',
    ]);

    $emisor = Nuevosalumnos::where('nombre', $request->nombre_emisor)->first();
    $receptor = Nuevosalumnos::where('nombre', $request->nombre_receptor)->first();

    Mensaje::create([
        'emisor_id' => $emisor->id,
        'receptor_id' => $receptor->id,
        'contenido' => $request->contenido,
    ]);
    //crear un metodo que genere una tarea llamar al store del controlador de las tareas
    //  Task::create('title','description'); crear un new taskcontroller para hacer un insert de tareas
    //
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
