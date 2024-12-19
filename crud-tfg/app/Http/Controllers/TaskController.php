<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //Nos retornará la vista del index, de la última a la primera (latest)
        //y le añadí el paginador de bootsrap con tres páginas para mostrar
        $tasks = Task::latest()->paginate(3);
        return view('index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     * Muestra el formulario para crear un nuevo recurso. En este caso se llama create
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     * Aquí guardamos el metodo store para ejecutar la lógica para almacenar
     * el nuevo registro con los datos que vengan del formulario
     */
    public function store(Request $request): RedirectResponse
    {
        /**
         * aqui voy hacer la funcion dd(); es coomo hacer var_dum(); y die();
         * en php puro, pero con un formato más bonito(esto solo fue para probarlo, luego segui sin dd())
         * con request all le decimos que nos imprima toda la información de la request enviada,
         * En este caso desde el formulario create.
         * También le puse validación a la respuesta una vez que se haga el formulario
         * para crear. Y ver si está correcto y si no lo está que muestre los errores
         * Y para finalizar también le puse mensaje de éxito si se hizo bien la tarea
     */

        $request->validate([
            'title'=> 'required',
            'description'=> 'required'
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with ('success', '¡Nueva tarea creada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task): View
    {
        return view ('edit', ['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task): RedirectResponse
    {
        //validacion y todo lo demás como en editar
        $request->validate([
            'title'=> 'required',
            'description'=> 'required'
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with ('success', '¡Nueva tarea actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task): RedirectResponse
    {
       $task ->delete();
       return redirect()->route('tasks.index')->with ('success', '¡Nueva tarea eliminada correctamente!');
    }
}
