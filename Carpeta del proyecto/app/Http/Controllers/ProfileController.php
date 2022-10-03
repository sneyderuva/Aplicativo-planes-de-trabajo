<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{
    public function index(){
        return "hola";
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),
        ['nombre'=>'required|min:5|max:20','apellido'=>'required|min:5|max:20',
        'pass1'=>'required|min:8|required_with:pass2|same:pass2',
        'pass2'=>'required|min:8']);

        if($validator -> fails()){
            dd('favor llenar bien');
        }else{
            dd('todo correcto');
        }
       
    }
}
