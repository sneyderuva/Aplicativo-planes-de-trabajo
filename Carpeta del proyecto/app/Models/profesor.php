<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
    use HasFactory;
    protected $fillable=['tipo_documento','nombre','apellidos','n_documento','direccion','telefono','email','escalafon'];
}
