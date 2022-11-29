<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesr extends Model
{
    use HasFactory;
    protected $fillable=['id_usuario','direccion','telefono','email','escalafon'];
}
