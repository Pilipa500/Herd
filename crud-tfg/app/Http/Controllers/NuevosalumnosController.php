<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\nuevosalumnos;//importé el model de nuevosalumnos
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Models\Mensaje;

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

    //métodos para buscar y buscarResultados de los alumnos
    public function buscar()
{
    return view('buscar');
}

public function buscarResultados(Request $request)
{
    $query = NuevosAlumnos::query();

    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%' . $request->nombre . '%');
    }

    if ($request->filled('colegio')) {
        $query->where('colegio', 'like', '%' . $request->colegio . '%');
    }

    if ($request->filled('curso')) {
        $query->where('curso', 'like', '%' . $request->curso . '%');
    }

    if ($request->filled('anio_graduacion')) {
        $query->where('anio_graduacion', $request->anio_graduacion);
    }

    $resultados = $query->get();

    return view('resultados', compact('resultados'));
}
  //a partir de aquí añadí el código para el login y logout
  public function showLoginForm()
  {
      return view('auth.login');
  }
  
  public function login(Request $request)
  {
      // Validación de los campos
      $request->validate([
          'email' => 'required|email',
          'password' => 'required|min:6',
      ]);
  
      // Intentar la autenticación usando la tabla nuevosalumnos
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

          $request->session()->regenerate();
  
          // Obtener el usuario autenticado
          $user = Auth::user();

  
          // Redirigir al perfil del alumno autenticado
          return redirect()->route('profile', ['id' => $user->id]);

      }
  
      // En caso de fallo, retornar con error
      throw ValidationException::withMessages([
          'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
      ]);
  }
  
  public function logout(Request $request)
  {
      Auth::guard('web')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('logout');
  }

  public function index()
{
    $usuarioId = auth()->id(); // Obtener el ID del usuario autenticado

    // Obtener mensajes donde el usuario es emisor o receptor
    $mensajes = Mensaje::where('emisor_id', $usuarioId)
                ->orWhere('receptor_id', $usuarioId)
                ->latest()
                ->paginate(5);

    return view('dashboard', compact('mensajes'));
}
  
}
?>