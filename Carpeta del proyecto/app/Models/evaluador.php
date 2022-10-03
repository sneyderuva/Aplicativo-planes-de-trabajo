<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluador extends Model
{
    use HasFactory;
    protected $fillable = ['nombres_completos','documento','email','telefono','cargo'];
}
