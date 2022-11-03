<?php

namespace App\Http\Controllers;

use App\Models\p_trabajo;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfesorController extends Controller
{

    public function index(){
        return view('profesor.usuario');
    }

    public function resumen(){
        

        $usuarios = \DB::table('users')
            ->select('users.*')
            ->orderBy('id','DESC')
            ->get();
        $profesores = \DB::table('profesores')
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
            ->join('profesores', 'profesores.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesores.id_vinculacion')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesores.id_dedicacion')

            ->select('p_trabajos.*','profesores.direccion','semestres.nombre_semestre','tipo_vinculaciones.nombre_tipo_vinculacion','dedicacion_tipos.nombre_tipo_dedicacion')
            ->orderBy('id','ASC')
            ->get();     
        $count_p_trabajos = $p_trabajos->count();
        $count_actividades = $actividades->count();
        return view('profesor.resumen')
        ->with('semestres',$semestres)
        ->with('usuarios',$usuarios)
        ->with('vinculaciones',$vinculaciones)
        ->with('dedicaciones',$dedicaciones)
        ->with('p_trabajos',$p_trabajos)
        ->with('count_p_trabajos',$count_p_trabajos)
        ->with('count_actividades',$count_actividades);
    }

    public function actividades(){
        return view('profesor.actividades');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['semestre'=>'required','dedicacion'=>'required','vinculacion'=>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{
            $p_trabajo = p_trabajo::create([
                
                'id_dedicacion'=>$request->dedicacion,
                'id_semestre'=>$request->semestre,
                'id_vinculacion'=>$request->vinculacion,
                

            ]);
            return back()->with('Correcto','Registrado correctamente');
            
        }
        
    }

    public function editPT(Request $request){

        $id_p_trabajo = $request->id;

        $usuarios = \DB::table('users')
            ->select('users.*')
            ->orderBy('id','DESC')
            ->get();
        $profesores = \DB::table('profesores')
            ->join('users','users.id','=','profesores.id_usuario')
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

        $actividades = \DB::table('actividades')
            ->where('actividades.id_plan_trabajo','=',$id_p_trabajo)
            ->join('tipo_actividades','tipo_actividades.id','=','actividades.id_tipo_actividad')
            ->select('actividades.*','tipo_actividades.nombre_tipo_actividad')
            
            ->orderBy('id','DESC')
            ->get();
        
        $tareas = \DB::table('tareas')
            
            ->where('tareas.id_p_trabajo','=',$id_p_trabajo)
            ->join('actividades','actividades.id','=','tareas.id_actividad')
            ->join('tipo_actividades','tipo_actividades.id','=','actividades.id_tipo_actividad')
            ->select('tareas.*')
            ->orderBy('id','DESC')
            ->get();

        $count_actividades = $actividades->count();
        $count_tareas = $tareas->count();
        $p_trabajos = \DB::table('p_trabajos')
        
            ->join('profesores', 'profesores.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesores.id_vinculacion')
            ->join('users','users.id','=','profesores.id_usuario')
            ->join('tipo_documentos','tipo_documentos.id','=','users.id_tipo_documento')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesores.id_dedicacion')
            ->join('p_academicos','p_academicos.id','=','profesores.id_programa')
            ->join('facultades','facultades.id','=','p_academicos.idfacultad')
            ->select('p_trabajos.*','profesores.direccion','profesores.telefono','profesores.escalafon',
            'semestres.nombre_semestre','tipo_vinculaciones.nombre_tipo_vinculacion','dedicacion_tipos.nombre_tipo_dedicacion',
            'users.n_documento','tipo_documentos.n_tipo_documento','users.email','users.nombres','users.apellidos',
            'p_academicos.nombre_programa','facultades.nombre_facultad')
            ->orderBy('id','ASC')
            ->get();     
        
        return view('profesor.ptEdit')
        ->with('semestres',$semestres)
        ->with('usuarios',$usuarios)
        ->with('vinculaciones',$vinculaciones)
        ->with('dedicaciones',$dedicaciones)
        ->with('id_p_trabajo',$id_p_trabajo)
        ->with('p_trabajos',$p_trabajos)
        ->with('actividades',$actividades)
        ->with('count_actividades',$count_actividades)
        ->with('tareas',$tareas)
        ->with('count_tareas',$count_tareas)
        ;
    }

}
