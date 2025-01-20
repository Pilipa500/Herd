<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Nuevosalumnos extends Model
{
    protected $fillable = [
        'nombre', 'email', 'password', 'colegio', 'anio_graduacion', 'curso', 'rol_id'
    ];

    protected $table = 'nuevosalumnos';

    // Mutator para convertir la contraseña en un hash antes de guardarla en la base de datos
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
