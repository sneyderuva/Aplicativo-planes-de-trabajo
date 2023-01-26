<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    use HasFactory;
    protected $fillable = ['id_actividad','id_p_trabajo','descripcion','descripcion2','horas'];
}
