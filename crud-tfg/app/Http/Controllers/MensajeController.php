<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function index()
    {
        // Obtener todos los mensajes donde el usuario autenticado
        // sea el emisor o el receptor.
        $usuarioId = auth()->id();
        $mensajes = Mensaje::where('emisor_id', $usuarioId)
            ->orWhere('receptor_id', $usuarioId);

        //nuevo metodo index que obtiene todos los mensajes el anterior solo 
        //mostraba los mensajes donde el usuario autenticado era el receptor y no TODOS.
        
        
       // $mensajes = Mensaje::all();//este código lo puse al principio, antes de trabajar con logados.
        $mensajes = Mensaje::latest()->paginate(5);//Muestra primero el último mensaje y  muestra los mensajes de 5 en 5 en el paginador
        return view('dashboard', compact('mensajes'));//cambiemos el nombre de la vista a dashboard de index

    }

    public function create()
    {
        return view('mensajes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            //'emisor_id' => 'required|exists:nuevosalumnos,id',
            'receptor_id' => 'required|exists:nuevosalumnos,id',
            'contenido' => 'required|string|max:1000',
        ]);

        Mensaje::create([
            'emisor_id' => auth()->id(),// Asegura que el usuario autenticado es el emisor (es más seguro)
            //'emisor_id' => $request->emisor_id,//este es el nuevo campo para obtener el id del emisor_id del formularionb de creación de mensajes
            'receptor_id' => $request->receptor_id,
            'contenido' => $request->contenido,
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
