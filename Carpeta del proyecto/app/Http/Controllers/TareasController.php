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
    public function edit_tareas(Request $request){

        $tarea = tarea::find($request->idt);
        
        $validator = Validator::make($request->all(),
        ['ndescripcion'=>'required',
        'nhoras'=>'required',
        'nsemanas'=>'required',
        'nhoras_semestre' =>'required']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('editarTarea','Edición no completada')
            ->withErrors($validator);
        }else{
            $p_trabajo = p_trabajo::find($request->nidpt);
            $p_trabajo->horas_semestre -= $tarea->horas_semestre;
            $p_trabajo->horas_semestre += $request->nhoras_semestre;
            $p_trabajo->save();
            $tarea->descripcion = $request->ndescripcion;
            $tarea->descripcion2 = $request->ndescripcion2;
            $tarea->horas = $request->nhoras;
            $tarea->semanas = $request->nsemanas;
            $tarea->horas_semestre = $request->nhoras_semestre;
            $tarea->save();
            
            return back()->with('Editado','Actualizado Correctamente');
        }
    }
    public function destroy($id){
        $tarea = tarea::find($id);
        $tarea->delete();
        return back()->with('Borrado','Eliminado Correctamente');
        
    }
    
}
