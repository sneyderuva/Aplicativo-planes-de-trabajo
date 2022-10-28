<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EvaluadorController;
use App\Http\Controllers\ProfileController;


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


Route::get('/', [ProfesorController::class,'resumen']);
Route::get('/u',[ProfesorController::class,'index']);

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get('/usuarios',[ProfileController::class,'index']);
    Route::resource('/usuarios',ProfileController::class);
    Route::delete('/usuarios/{id}',[ProfileController::class,'destroy']);
    Route::post('/usuarios/edit',[ProfileController::class,'editarUsuario']);

});
Route::group(['prefix'=>'p','as'=>'p'],function(){
    Route::get('/', [ProfesorController::class,'resumen']);
    Route::post('/', [ProfesorController::class,'store']);
    
    
    Route::get('/{id}/editar',[ProfileController::class,'editar']);
    Route::get('/a', [ProfesorController::class,'mis_actividades']);
    
});

Route::group(['prefix'=>'evaluador','as'=>'evaluador'],function(){
    Route::get('/', [EvaluadorController::class,'index']);
    Route::get('/e', [EvaluadorController::class, 'evaluacion']);
    
});