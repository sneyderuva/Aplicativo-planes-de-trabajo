<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subtarea extends Model
{
    use HasFactory;
    protected $fillable = ['id_tarea','id_p_trabajo_tarea','titulo','descripcion','horas','horas_semestre','semanas'];
}
