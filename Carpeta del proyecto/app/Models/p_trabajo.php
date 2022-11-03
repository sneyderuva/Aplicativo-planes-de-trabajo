<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_trabajo extends Model
{
    use HasFactory;
    protected $fillable = ['id_profesor','id_vinculacion','id_dedicacion','horas_semana','horas_semestre','id_semestre'];
}
