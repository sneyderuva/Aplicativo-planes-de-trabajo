<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprobacion_plan extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_aprobacion','aprobado'];
}
