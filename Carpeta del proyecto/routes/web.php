<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EvaluadorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;

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

Auth::routes();
Route::get('/', [ProfesorController::class,'progreso'])
    ->middleware('auth')
    ->name('home');
Route::post('/', [ProfesorController::class,'store_pt']);
Route::get('/perfil', [ProfileController::class,'perfil']);

Route::group(['prefix'=>'perfil','as'=>'perfil'],function(){
    Route::get('/', [ProfileController::class,'perfil']);
    Route::get('/datos', [ProfileController::class,'datosPersonales']);
    Route::get('/seguridad', [ProfileController::class,'seguridad']);

});

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index'])
        ->middleware('auth')
        ->name('admin.index');
    Route::get('/usuarios',[ProfileController::class,'index'])
        ->middleware('auth')
        ->name('admin.index');
    Route::resource('/usuarios',ProfileController::class)
        ->middleware('auth');
    
    Route::delete('/usuarios/{id}',[ProfileController::class,'destroy']);
    Route::post('/usuarios/edit',[ProfileController::class,'editarUsuario']);

});
Route::group(['prefix'=>'p','as'=>'p'],function(){
    Route::get('/', [ProfesorController::class,'resumen']); 
    Route::get('/a', [ProfesorController::class,'actividades']); 
    Route::delete('/{id}', [ProfesorController::class,'destroy']);
    Route::get('/{id}', [ProfesorController::class,'editPT']);
    
    Route::post('/{id}',[ProfesorController::class,'store_actividades']);
    Route::post('/{id}',[TareasController::class,'store_tareas']);

    Route::get('/{id}/t', [ProfesorController::class,'backPT']);
    Route::post('/{id}/t', [ProfesorController::class,'tareas']);
});

Route::group(['prefix'=>'u','as'=>'usuario'],function(){
    Route::get('/', [EvaluadorController::class,'index']);
    Route::get('/login', [ProfileController::class,'login']);

    Route::get('/{id}', [EvaluadorController::class, 'verPTs']);

    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

