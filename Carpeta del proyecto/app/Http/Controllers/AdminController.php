<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(){
        return view('administrador/admin');
    }
    public function usuarios(){
        return view('administrador/usuarios');
    }

}
