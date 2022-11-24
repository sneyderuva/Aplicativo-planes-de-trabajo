<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class EvaluadorController extends Controller
{
    
    public function index(Request $request){
        $id_profesor = $request->id;

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
        
        $profesores = \DB::table('profesores')
            ->where('profesores.id','=',$id_profesor)
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesores.id_vinculacion')
            ->select('profesores.*','tipo_vinculaciones.nombre_tipo_vinculacion')
            ->orderBy('id','ASC')
            ->get();
        
        $vinculaciones = \DB::table('tipo_vinculaciones')
            ->select('tipo_vinculaciones.*')
            ->orderBy('id','ASC')
            ->get();
        $dedicaciones = \DB::table('dedicacion_tipos')
            ->select('dedicacion_tipos.*')
            ->orderBy('id','ASC')
            ->get();   
        $p_trabajos = \DB::table('p_trabajos')
            ->where('profesores.id','=',$id_profesor)
            ->join('profesores', 'profesores.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesores.id_vinculacion')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesores.id_dedicacion')
            
            ->select('p_trabajos.*','profesores.direccion','semestres.nombre_semestre','tipo_vinculaciones.nombre_tipo_vinculacion','dedicacion_tipos.nombre_tipo_dedicacion')
            ->orderBy('id','ASC')
            ->get();     
        $count_p_trabajos = $p_trabajos->count();
        return view('evaluador.search')
        ->with('id_profesor',$id_profesor)
        ->with('usuarios',$usuarios)
        ->with('tipousuarios',$tipousuarios)
        ->with('semestres',$semestres)
        ->with('tipo_documentos',$tipo_documentos)
        ->with('vinculaciones',$vinculaciones)
        ->with('dedicaciones',$dedicaciones)
        ->with('p_trabajos',$p_trabajos)
        ->with('count_p_trabajos',$count_p_trabajos)
        ;
            
    }
    public function evaluacion(){
        return view('evaluador.evaluacion');
    }

    public function verPTs(Request $request){
        
        $id_profesor = $request->id;

        $usuarios = DB::table('users')
            
            ->select('users.*')
            ->orderBy('id','DESC')
            ->get();
        $profesores = \DB::table('profesores')
            ->where('profesores.id','=',$id_profesor)
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesores.id_vinculacion')
            ->select('profesores.*','tipo_vinculaciones.nombre_tipo_vinculacion')
            ->orderBy('id','ASC')
            ->get();
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
        $p_trabajos = \DB::table('p_trabajos')
            ->where('profesores.id','=',$id_profesor)
            ->join('profesores', 'profesores.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesores.id_vinculacion')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesores.id_dedicacion')
            
            ->select('p_trabajos.*','profesores.direccion','semestres.nombre_semestre','tipo_vinculaciones.nombre_tipo_vinculacion','dedicacion_tipos.nombre_tipo_dedicacion')
            ->orderBy('id','ASC')
            ->get();     
        $count_p_trabajos = $p_trabajos->count();
        return view('profesor.resumen')
        ->with('semestres',$semestres)
        ->with('usuarios',$usuarios)
        ->with('vinculaciones',$vinculaciones)
        ->with('dedicaciones',$dedicaciones)
        ->with('p_trabajos',$p_trabajos)
        ->with('count_p_trabajos',$count_p_trabajos)
        ;
    }

}

