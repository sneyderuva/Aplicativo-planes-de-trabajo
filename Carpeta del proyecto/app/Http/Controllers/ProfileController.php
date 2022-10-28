<?php

namespace App\Http\Controllers;

use App\Models\semestre;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
class ProfileController extends Controller
{
    public function index(){
        $semestres = \DB::table('semestres')
        ->select('semestres.*')
        ->orderBy('id','DESC')
        ->get();
        $usuarios = \DB::table('users')
        ->select('users.*')
        ->orderBy('id','DESC')
        ->get();
        $tipousuarios = \DB::table('tipo_usuarios')
        ->select('tipo_usuarios.*')
        ->get();
        return view('administrador.usuarios')
        ->with('usuarios',$usuarios)
        ->with('tipousuarios',$tipousuarios)
        ->with('semestres',$semestres);
           
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['tipo_usuario'=>'required|string|required_without',
        'email'=>'required',
        'nombres'=>'required|string|min:3|max:25',
        'apellidos'=>'required|string|min:3|max:25',
        'contraseña'=>'required|min:8|required_with:confirmar-contraseña|same:confirmar-contraseña',
        'confirmar-contraseña'=>'required|min:8']);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{
            $usuario = User::create([
                'nombres'=>$request->nombres,
                'apellidos'=>$request->apellidos,
                'tipo_usuario'=>$request->tipo_usuario,
                'email'=>$request->email,
                'password'=>$request->contraseña

            ]);
            
            return back()->with('Correcto','Registrado correctamente');
            
        } 
    }
    public function store_semestre(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre_semestre'=>'required',
            'inicio'=>'required',
            'final'=>'required'
        ]);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsertSemestre','Debes llenar los campos correctamente')
            ->withErrors($validator);
        }else{
            $semestre = Semestre::create([
                'nombre_semestre'=>$request->nombre_semestre,
                'inicio'=>$request->inicio,
                'final'=>$request->final
            ]);
        return back()->with('Correcto','Registrado correctamente');
    }
}
        
       
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('Borrado','Eliminado Correctamente');
        
    }

    public function editarUsuario(Request $request){

        $user = User::find($request->id);
        $semestre = Semestre::find($request->id);
        $validator = Validator::make($request->all(),
        ['tipo_usuario'=>'required',
        'nombres'=>'required|min:3|max:25',
        'apellidos'=>'required|min:3|max:25' ]);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Edición no completada')
            ->withErrors($validator);
        }else{
            $user->nombres = $request->nombres;
            $user->apellidos = $request->apellidos;
            $user->email = $request->email;
            $user->id = $request->id;
            $user->tipo_usuario = $request->tipo_usuario;
            $validator2 = Validator::make($request->all(),
            ['nuevacontraseña'=>'required|min:8|required_with:confirmarnuevacontraseña|same:confirmarnuevacontraseña',
            'confirmarnuevacontraseña'=>'required|min:8']);
            
            if(!$validator2->fails()){
                $user->password = $request->nuevacontraseña;
            }
            $user->save();
            return back()->with('Editado','Actualizado Correctamente');
        }
    }
}
