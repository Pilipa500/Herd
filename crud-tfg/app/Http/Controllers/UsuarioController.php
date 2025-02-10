<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Importar el modelo Usuario
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    // public function register(Request $request) este es el que estaba hasta ahora x el video
{
    $request->validate([
        'name' => 'required|string|max:30',
        'email' => 'required|string|email|max:50|unique:usuarios',
        'password' => 'required|string|min:8|confirmed',
        'colegio' => 'required|string|max:100',
        'graduacion' => 'required|integer',
        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = time().'.'.$request->profile_image->extension();  
    $request->profile_image->move(public_path('images'), $imageName);

    //crear el nuevo usuario    
    $usuario = new Usuarios([
        'nombre' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'colegio' => $request->colegio,
        'anio_graduacion' => $request->graduacion,
        'foto' => $imageName,
        'rol_id' => 1, // Asignar un rol por defecto
    ]);

    //guardar el usuario en la base de datos(intenté esta nueva forma de guardar el usuario)
    Usuarios::create($usuario->toArray());
    //$usuario->save();

    return redirect()->route('usuarios.index')->with('success', 'Usuario registrado exitosamente.');
    // return redirect()->route('home')->with('success', 'Usuario registrado exitosamente'); este lo tuve al principio
}
//otros metodos para completar el crud de usuarios
public function show($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:50|unique:usuarios,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'colegio' => 'required|string|max:100',
            'graduacion' => 'required|integer',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $usuario = Usuarios::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('images'), $imageName);
            $usuario->foto = $imageName;
        }

        $usuario->nombre = $request->name;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->colegio = $request->colegio;
        $usuario->anio_graduacion = $request->graduacion;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
  
}
