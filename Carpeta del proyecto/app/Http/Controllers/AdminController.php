<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('adminAuth');
    }
    public function index(){
        return view('administrador/admin');
    }
    public function usuarios(){
        return view('administrador/usuarios');
    }

}

