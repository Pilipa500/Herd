<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    
    protected $fillable = [ 'nombre', 'email', 'password', 'colegio', 'anio_graduacion', 'foto', 'curso', 'rol_id' ];
}
