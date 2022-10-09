<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfesorController extends Controller
{
    public function resumen(){
        return view('profesor.profesor');
    }

    public function mis_actividades(){
        return view('profesor.actividades');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['p_academico'=>'required','dedicacion'=>'required','vinculacion'=>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{
            return back()->with('Correcto','Registrado correctamente');
            
        }
        
    }

}
