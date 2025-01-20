<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Me aseguro de que el modelo apunte a la tabla 'usuarios'

    protected $fillable = [
        'nombre', 'email', 'password', 'colegio', 'anio_graduacion', 'foto', 'curso', 'rol_id'
    ];

    // Mutator para convertir la contraseña en un hash antes de guardarla en la base de datos
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}