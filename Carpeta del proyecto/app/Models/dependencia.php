<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dependencia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_dependencia'];

}
