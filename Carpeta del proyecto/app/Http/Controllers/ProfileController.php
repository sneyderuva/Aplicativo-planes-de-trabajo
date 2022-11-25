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
    public function login(){
        return view('layouts.login');
    }

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
        return view('administrador.usuarios')
        ->with('usuarios',$usuarios)
        ->with('tipousuarios',$tipousuarios)
        ->with('semestres',$semestres)
        ->with('tipo_documentos',$tipo_documentos);
           
    }
    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['tipo_usuario'=>'required',
        'tipo_documento'=>'required',
        'n_documento'=>'required|min:5|max:12',
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
                'n_documento'=>$request->n_documento,
                'id_tipo_documento'=>$request->tipo_documento,
                'apellidos'=>$request->apellidos,
                'id_tipo_usuario'=>$request->tipo_usuario,
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
        ['ntipo_usuario'=>'required',
        'nnombres'=>'required|min:3|max:25',
        'napellidos'=>'required|min:3|max:25' ]);

        if($validator -> fails()){
            return back()->withInput()
            ->with('ErrorInsert','Edición no completada')
            ->withErrors($validator);
        }else{
            $user->nombres = $request->nnombres;
            $user->apellidos = $request->napellidos;
            $user->email = $request->nemail;
            $user->id = $request->id;
            $user->id_tipo_usuario = $request->ntipo_usuario;
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
