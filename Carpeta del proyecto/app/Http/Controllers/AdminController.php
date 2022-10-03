<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('administrador/admin');
    }
    public function usuarios(){
        return view('administrador/usuarios');
    }

}
