<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * aqui se hace la variable que nos servirá para indexar con un array asociativo
     * 
     * Se podría hacer de las tres maneras que abajo pongo, aunque solo usaré la primera
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));

        //return view ('students'.index')->with ('students', $students);
        //return view ('students'.index',['students'=> $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('students.create');
    }

    /**
     * Store a newly created resource in storage.
     * Aqui se ponen las validaciones de los campos.y se usa el método request ´
     * para ello. Con Student::create...capturamos todos los campos. Si fueran
     * más con añadir en las validación los otros campos y sus características se irían añadiendo
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1'
        ]);
        Student::create($request->all());
    //  aquí redireccionaria la páginas cuando se carguen
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view ('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1'
        ]);
        //encontramos al estudiante
        $student = Student::findOrFail($id);
        //lo actualizamos
        $student->update($request->all());
        //lo redirecciono a la vista de students
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');

    }
}
