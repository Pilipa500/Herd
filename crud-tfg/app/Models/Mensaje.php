<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'emisor_id',
        'receptor_id',
        'contenido',
    ];

    public function emisor()
    {
        return $this->belongsTo(NuevosAlumnos::class, 'emisor_id');
    }

    public function receptor()
    {
        return $this->belongsTo(NuevosAlumnos::class, 'receptor_id');
    }
}
