<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfesorController extends Controller
{

    public function index(){
        return view('profesor.usuario');
    }

    public function resumen(){
        $semestres = \DB::table('semestres')
            ->select('semestres.*')
            ->orderBy('id','DESC')
            ->get();
        $vinculaciones = \DB::table('tipo_vinculaciones')
            ->select('tipo_vinculaciones.*')
            ->orderBy('id','ASC')
            ->get();
        $dedicaciones = \DB::table('dedicacion_tipos')
            ->select('dedicacion_tipos.*')
            ->orderBy('id','ASC')
            ->get();        

        return view('profesor.resumen')
        ->with('semestres',$semestres)
        ->with('vinculaciones',$vinculaciones)
        ->with('dedicaciones',$dedicaciones);
    }

    public function mis_actividades(){
        return view('profesor.actividades');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['semestre'=>'required|min:3','dedicacion'=>'required|min:3','vinculacion'=>'required|min:3']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{
            $p_trabajo = P_trabajo::create([
                'dedicacion'=>$request->dedicacion,
                'semestre'=>$request->semestre,
                'vinculacion'=>$request->vinculacion,
                'email'=>$request->email,
                'password'=>$request->contraseña

            ]);
            return back()->with('Correcto','Registrado correctamente');
            
        }
        
    }

}
