<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Nuevosalumnos;//importé el model de Nuevosalumnos
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Task;
use App\Models\Mensaje;

class NuevosalumnosController extends Controller
{
    //método para mostrar el formulario de registro
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
         
       
        //redirección a la pantalla del perfil con un mensaje de éxito
         return redirect()->route('dashboard')->with('success', 'Usuario registrado exitosamente.');
        
    }
    //método para mostrar el formulario de registro con null para $alumno, (lo incluí para que no diera error en la vista)
    //después de haber cambiado el diseño del formulario de registro (un mismo formulario para registro y edicion), con condiciones para el usuario autenticado
    // Asegura que $alumno sea null para registros nuevos
    public function create()
{
    return view('registro', ['alumno' => null]);
}

    //método para editar los datos del alumno
    public function edit($id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user(); 
    
        // Verificar si el usuario autenticado tiene el mismo ID que el del perfil a editar
        if ($user->id != $id) {
            abort(403, 'No tienes permiso para editar este perfil');
        }
    
        // Cargar los datos del alumno desde la base de datos, los muestra o da un error si no se encuentra
        $alumno = Nuevosalumnos::findOrFail($id);
    
        // Retornar la vista de edición con los datos del alumno cargados
        return view('registro', compact('alumno')); 
    }
    
    //método para actualizar los datos del alumno en el registro
    public function update(Request $request, $id)
    {
        $user = Auth::user();
    
        if ($user->id != $id) {
            abort(403, 'No tienes permiso para actualizar este perfil');
        }
    
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:nuevosalumnos,email,' . $user->id, // Asegura que el email sea único excepto para el usuario actual
            'colegio' => 'required|string|max:100',
            'curso' => 'string|max:100',
            'anio_graduacion' => 'required|integer',
        ]);
    
        // Actualiza los campos necesarios en la base de datos
        $user->update($request->only(['nombre', 'email', 'colegio', 'curso', 'anio_graduacion', 'rol_id']));
    
        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Perfil actualizado con éxito');
    }

    //métodos para buscar y buscarResultados de los alumnos
    public function buscar()
{
    //$usuarioId = auth()->id();//buscar solo los alumnos que estén logados
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

          if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard'); // Redirige al dashboard de admin
        }

  
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
      return redirect->route('login');//redirige a la página de inicio de sesión
  }

  public function index()
{
    $usuarioId = auth()->id();
    $usuario = Auth::user();

    // Obtener mensajes donde el usuario es emisor o receptor
    $mensajes = Mensaje::where('emisor_id', $usuarioId)
                ->orWhere('receptor_id', $usuarioId)
                ->latest()
                ->paginate(5);
    //logica para mostrar el perfil de admin las tareas
    //con un registro de depuración para verificar si el método isAdmin() funciona correctamente
    if ($usuario->isAdmin()) {
        \Log::info('Usuario Admin: ' . $usuario->email);
        $tareas = Task::all();
        \Log::info('Tareas: ' . count($tareas));
        return view('dashboard', compact('mensajes', 'tareas'));
    } else {
        \Log::info('Usuario No Admin: ' . $usuario->email);

    }

    return view('dashboard', compact('mensajes'));
}
  
}
?>