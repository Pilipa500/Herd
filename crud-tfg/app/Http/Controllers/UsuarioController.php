<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Asegúrate de importar el modelo Usuario
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function register(Request $request)
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

    Usuario::create([
        'nombre' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'colegio' => $request->colegio,
        'anio_graduacion' => $request->graduacion,
        'foto' => $imageName,
        'rol_id' => 1, // Asignar un rol por defecto
    ]);

    return redirect()->route('home')->with('success', 'Usuario registrado exitosamente');
}

}
