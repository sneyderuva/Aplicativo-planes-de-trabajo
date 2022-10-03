<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_trabajo extends Model
{
    use HasFactory;
    protected $fillable = ['periodo_academico','dedicacion','tipo_vinculado','fecha_elaboracion'];
}
