<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
class ProfileController extends Controller
{
    public function index(){
        return "hola";
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['nombres'=>'required|min:3|max:25',
        'apellidos'=>'required|min:3|max:25',
        'contraseña'=>'required|min:8|required_with:confirmar-contraseña|same:confirmar-contraseña',
        'confirmar-contraseña'=>'required|min:8']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{
            return back()->with('Correcto','Registrado correctamente');
            
        }
        
    }
}
