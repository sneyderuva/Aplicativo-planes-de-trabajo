<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function resumen(){
        return view('profesor.profesor');
    }

    public function mis_actividades(){
        return view('profesor.actividades');
    }
}
