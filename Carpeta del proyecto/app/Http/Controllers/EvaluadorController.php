<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluadorController extends Controller
{
    
    public function index(){
        $semestres = \DB::table('semestres')
        ->select('semestres.*')
        ->orderBy('id','DESC')
        ->get();
        $usuarios = \DB::table('users')
        
        ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'users.id_tipo_usuario')
        ->join('tipo_documentos', 'tipo_documentos.id', '=', 'users.id_tipo_documento')
        ->select('tipo_usuarios.nombre_tipo','users.*','tipo_documentos.n_tipo_documento')
        ->orderBy('id','DESC')
        ->get();
        $tipousuarios = \DB::table('tipo_usuarios')
        ->select('tipo_usuarios.*')
        ->get();
        $tipo_documentos = \DB::table('tipo_documentos')
        ->select('tipo_documentos.*')
        ->get();
        return view('evaluador.search')
        ->with('usuarios',$usuarios)
        ->with('tipousuarios',$tipousuarios)
        ->with('semestres',$semestres)
        ->with('tipo_documentos',$tipo_documentos);
            
    }
    public function evaluacion(){
        return view('evaluador.evaluacion');
    }

}

