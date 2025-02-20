<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Nuevosalumnos extends Authenticatable
{
    use Notifiable; // Permite enviar notificaciones en el futuro

    // Nombre de la tabla asociada al modelo
    protected $table = 'nuevosalumnos';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 'email', 'password', 'colegio', 'anio_graduacion', 'curso', 'rol_id'
    ];

    // Campos ocultos cuando se serializa el modelo
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Cast automático para la contraseña (Laravel 10+)
    protected $casts = [
        'password' => 'hashed', // Laravel encripta automáticamente la contraseña
    ];
   
     // definir el campo del rol del administrador
    public function isAdmin()
    {
       return $this->rol_id == 2;
    }


}
