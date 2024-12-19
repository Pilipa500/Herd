<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //ahora voy a especificar a Laravel que datos si pueden ser asignados de manera masiva
   use HasFactory;

   protected $fillable = ['title','description','due_date','status'];

}
