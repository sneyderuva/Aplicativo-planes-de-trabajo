<?php

namespace App\Http\Controllers;
use App\Models\p_trabajo;
use App\Models\Esactividad;
use App\Models\subtarea;
use App\Models\tarea;

use Illuminate\Http\Request;
use Validator;
use Dompdf\Dompdf;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class TareasController extends Controller
{
    public function store_tareas(Request $request){
        $validator = Validator::make($request->all(),
        ['titulo'=>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('Error2','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{

            $actividad = tarea::create([
                'id_p_trabajo'=>$request->idpt,
                'id_actividad'=>$request->idact,
                'horas'=>$request->semanales,
                'descripcion'=>$request->titulo,
                'descripcion2'=>$request->descripcion,
                'semanas'=>$request->semanas,
                'horas_semestre'=>$request->horas_semestre
            ]);
            $p_trabajo = p_trabajo::find($request->idpt);
            $p_trabajo->horas_semestre += $request->horas_semestre;
            $p_trabajo->save();
            return back()->with('Correcto','Registrado correctamente');
            
        } 
    }
    public function store_subtareas(Request $request){
        $validator = Validator::make($request->all(),
        ['titulo'=>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('Error2','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{

            $subtarea = subtarea::create([
                'id_tarea'=>$request->idt,
                'id_p_trabajo_tarea'=>$request->idpt,
                'horas'=>$request->semanales,
                'descripcion'=>$request->titulo,
                'titulo'=>$request->descripcion,
                'semanas'=>$request->semanas,
                'horas_semestre'=>$request->horas_semestre
            ]);
            $p_trabajo = p_trabajo::find($request->idpt);
            $p_trabajo->horas_semestre += $request->horas_semestre;
            $p_trabajo->save();
            return back()->with('Correcto','Registrado correctamente');
            
        } 
    }
    public function destroy($id){
        $tarea = tarea::find($id);
        $tarea->delete();
        return back()->with('Borrado','Eliminado Correctamente');
        
    }
    
}
