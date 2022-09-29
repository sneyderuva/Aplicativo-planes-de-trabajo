<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/', function () {
        return view('admin');
    });
    Route::get('/usuarios', function () {
        return view('usuarios');
    });
    
});
Route::group(['prefix'=>'profesor','as'=>'profesor'],function(){
    Route::get('/', function () {
        return view('profesor.profesor');
    });
    Route::get('/resumen', function () {
        return view('profesor.resumen');
    });
    
});

Route::group(['prefix'=>'evaluador','as'=>'evaluador'],function(){
    Route::get('/', function () {
        return view('evaluador.evaluador');
    });
    Route::get('/resumen', function () {
        return view('evaluador.resumen');
    });
    
});