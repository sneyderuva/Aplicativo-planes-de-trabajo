<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esactividad extends Model
{
    use HasFactory;
    protected $fillable = ['id_plan_trabajo','id_tipo_actividad','horas_semanales','horas_semestre','','alcance'];

}
