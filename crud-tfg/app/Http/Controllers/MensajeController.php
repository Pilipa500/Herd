<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function index()
    {
        // Obtener todos los mensajes donde el usuario autenticado es el receptor
        // $mensajes = Mensaje::where('receptor_id', auth()->id())->get();
        // return view('mensajes.index', compact('mensajes'));
        //nuevo metodo index que obtiene todos los mensajes el anterior solo 
        //mostraba los mensajes donde el usuario autenticado era el receptor y no TODOS.
        $mensajes = Mensaje::all();
        $mensajes = Mensaje::latest()->paginate(5);
        return view('mensajes.index', compact('mensajes'));

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
            //'emisor_id' => auth()->id(),este el el original q tenía antes de añadir el campo emisor_id al cambiarlo a un campo de la tabla mensajes
            'emisor_id' => $request->emisor_id,//este es el nuevo campo para obtener el id del emisor_id del formularionb de creación de mensajes
            'receptor_id' => $request->receptor_id,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('mensajes.index')->with('success', 'Mensaje enviado correctamente.');
    }

    public function show($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        return view('mensajes.show', compact('mensaje'));
    }
}
