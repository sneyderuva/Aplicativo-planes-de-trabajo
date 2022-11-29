<?php

namespace App\Http\Controllers;

use App\Models\p_trabajo;
use App\Models\Esactividad;
use App\Models\tarea;
use App\Models\profesr;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Dompdf\Dompdf;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class ProfesorController extends Controller
{

    public function progreso(Request $request){
        $email=$request->email;

        $usuarios = \DB::table('users')
            ->where('users.email','=',$email)
            ->select('users.*')
            ->orderBy('id','DESC')
            ->get();
        
        return view('profesor.progreso')
            ->with('usuario',$usuarios);
    }

    public function store_pt(Request $request){
        $validator = Validator::make($request->all(),
        ['semestre'=>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{

            $pt = p_trabajo::create([
                'id_semestre'=>$request->semestre,
                'id_profesor'=>Auth::User()->id
            ]);

            $profesor = profesr::create([
                'id_usuario'=>Auth::User()->id  
            ]);
            return back()->with('Correcto','Registrado correctamente');
            
        } 
    }

    public function index(){
        return view('profesor.usuario');
    }

    public function resumen(){
        
        $usuarios = \DB::table('users')
            ->select('users.*')
            ->orderBy('id','DESC')
            ->get();
        $profesores = \DB::table('profesrs')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesrs.id_vinculacion')
            ->select('profesrs.*','tipo_vinculaciones.nombre_tipo_vinculacion')
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
            ->join('profesrs', 'profesrs.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesrs.id_vinculacion')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesrs.id_dedicacion')

            ->select('p_trabajos.*','profesrs.direccion','semestres.nombre_semestre','tipo_vinculaciones.nombre_tipo_vinculacion','dedicacion_tipos.nombre_tipo_dedicacion')
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
        $profesores = \DB::table('profesrs')
            ->join('users','users.id','=','profesrs.id_usuario')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesrs.id_vinculacion')
            ->select('profesrs.*','tipo_vinculaciones.nombre_tipo_vinculacion')
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

        $actividades = \DB::table('esactividads')
            ->where('esactividads.id_plan_trabajo','=',$id_p_trabajo)
            ->join('tipo_actividades','tipo_actividades.id_tipo_actividad','=','esactividads.id_tipo_actividad')
            ->select('esactividads.*','tipo_actividades.nombre_tipo_actividad')
            
            ->orderBy('id','ASC')
            ->get();
        
        $tareas = \DB::table('tareas')
            
            ->where('tareas.id_p_trabajo','=',$id_p_trabajo)
            ->join('esactividads','esactividads.id','=','tareas.id_actividad')
            ->join('tipo_actividades','tipo_actividades.id_tipo_actividad','=','esactividads.id_tipo_actividad')
            ->select('tareas.*','tipo_actividades.id_tipo_actividad')
            ->orderBy('id','ASC')
            ->get();
        $tipo_acts = \DB::table('tipo_actividades')
            ->select('tipo_actividades.*')
            ->orderBy('id_tipo_actividad','ASC')
            ->get();

        $count_actividades = $actividades->count();
        $count_tareas = $tareas->count();
        $p_trabajos = \DB::table('p_trabajos')
        
            ->join('profesrs', 'profesrs.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesrs.id_vinculacion')
            ->join('users','users.id','=','profesrs.id_usuario')
            ->join('tipo_documentos','tipo_documentos.id','=','users.id_tipo_documento')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesrs.id_dedicacion')
            ->join('p_academicos','p_academicos.id','=','profesrs.id_programa')
            ->join('facultades','facultades.id','=','p_academicos.idfacultad')
            ->select('p_trabajos.*','profesrs.direccion','profesrs.telefono','profesrs.escalafon',
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
        ->with('tipo_acts',$tipo_acts)
        ;
    }

    public function print(Request $request){
 
        $id_p_trabajo = $request->id;

        $usuarios = \DB::table('users')
            ->select('users.*')
            ->orderBy('id','DESC')
            ->get();
        $profesores = \DB::table('profesrs')
            ->join('users','users.id','=','profesrs.id_usuario')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesrs.id_vinculacion')
            ->select('profesrs.*','tipo_vinculaciones.nombre_tipo_vinculacion')
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

        $actividades = \DB::table('esactividads')
            ->where('esactividads.id_plan_trabajo','=',$id_p_trabajo)
            ->join('tipo_actividades','tipo_actividades.id_tipo_actividad','=','esactividads.id_tipo_actividad')
            ->select('esactividads.*','tipo_actividades.nombre_tipo_actividad')
            
            ->orderBy('id','ASC')
            ->get();
        
        $tareas = \DB::table('tareas')
            
            ->where('tareas.id_p_trabajo','=',$id_p_trabajo)
            ->join('esactividads','esactividads.id','=','tareas.id_actividad')
            ->join('tipo_actividades','tipo_actividades.id_tipo_actividad','=','esactividads.id_tipo_actividad')
            ->select('tareas.*','tipo_actividades.id_tipo_actividad')
            ->orderBy('id','ASC')
            ->get();

        $count_actividades = $actividades->count();
        $count_tareas = $tareas->count();
        $p_trabajos = \DB::table('p_trabajos')
        
            ->join('profesrs', 'profesrs.id', '=', 'p_trabajos.id_profesor')
            ->join('tipo_vinculaciones', 'tipo_vinculaciones.id', '=', 'profesrs.id_vinculacion')
            ->join('users','users.id','=','profesrs.id_usuario')
            ->join('tipo_documentos','tipo_documentos.id','=','users.id_tipo_documento')
            ->join('semestres', 'semestres.id', '=', 'p_trabajos.id_semestre')
            ->join('dedicacion_tipos', 'dedicacion_tipos.id', '=', 'profesrs.id_dedicacion')
            ->join('p_academicos','p_academicos.id','=','profesrs.id_programa')
            ->join('facultades','facultades.id','=','p_academicos.idfacultad')
            ->select('p_trabajos.*','profesrs.direccion','profesrs.telefono','profesrs.escalafon',
            'semestres.nombre_semestre','tipo_vinculaciones.nombre_tipo_vinculacion','dedicacion_tipos.nombre_tipo_dedicacion',
            'users.n_documento','tipo_documentos.n_tipo_documento','users.email','users.nombres','users.apellidos',
            'p_academicos.nombre_programa','facultades.nombre_facultad')
            ->orderBy('id','ASC')
            ->get();     
            $array = array('id_p_trabajo'=>$id_p_trabajo,'semestres'=>$semestres,
            'usuarios'=>$usuarios,'vinculaciones'=>$vinculaciones,'dedicaciones'=>$dedicaciones,'p_trabajos'=>$p_trabajos,
            'esactividads'=>$actividades,'count_actividades'=>$count_actividades,'tareas'=>$tareas,'count_tareas'=>$count_tareas);

        $pdf=PDF::loadView('profesor.reportePT',['p_trabajos'=>$p_trabajos]);
            
        $pdf->render();
        return $pdf->download('pdf.pdf');
    
    }

    public function tareas(Request $request){

        $id_p_trabajo = $request->id_p_trabajo;
        $nombre_tarea = $request->nombre_tarea;
        return view('profesor.actividades')
        ->with('id_p_trabajo',$id_p_trabajo)
        ->with('nombre_tarea',$nombre_tarea)
        ->with('nombre_actividad',$request->nombre_actividad);
    }

    public function backPT(){
        return back();
    }

    public function store_actividades(Request $request){
        $validator = Validator::make($request->all(),
        ['idpt'=>'required',
        'actividad'=>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{

            $actividad = Esactividad::create([
                'id_plan_trabajo'=>$request->idpt,
                'id_tipo_actividad'=>$request->actividad,
                'horas_semanales'=>$request->semanales,
                'horas_semestre'=>$request->semestrales
            ]);
            return back()->with('Correcto','Registrado correctamente');
            
        } 
    }
   
    public function destroy($id){
        $p_trabajo = p_trabajo::find($id);
        $p_trabajo->delete();
        return back()->with('Borrado','Eliminado Correctamente');
        
    }
}
