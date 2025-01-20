<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    /**
     * 
     * Esta clase es un modelo de Eloquent en Laravel lo que significa
     * que representa una tabla en la bbdd y da métodos para interactuar
     * con ella.
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'emisor_id',
        'receptor_id',
        'contenido',
    ];
//@fillable es un array que define los atributos que se pueden asignar en masa.
    public function emisor()
    {
        return $this->belongsTo(NuevosAlumnos::class, 'emisor_id');
    }
//emisor: es una función que define una relación de tipo belongsTo con 
//el modelo NuevosAlumnos, esto significa que un mensaje tiene un 
//emisor que es un registro en la tabla de NuevosAlumnos. La FK en la 
//tabla mensajes es emisor_id.
    public function receptor()
    {
        return $this->belongsTo(NuevosAlumnos::class, 'receptor_id');
    }
}
