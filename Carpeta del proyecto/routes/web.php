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
Route::post('/', [ProfesorController::class,'store_pt'])
    ->middleware('auth')
    ->name('home');
Route::get('/perfil', [ProfileController::class,'perfil'])
    ->middleware('auth')
    ->name('home');
Route::group(['prefix'=>'perfil','as'=>'perfil'],function(){
    Route::get('/', [ProfileController::class,'perfil'])
        ->middleware('auth')
        ->name('home');
    Route::get('/datos', [ProfileController::class,'datosPersonales'])
        ->middleware('auth')
        ->name('home');
    Route::get('/seguridad', [ProfileController::class,'seguridad'])
->middleware('auth')
    ->name('home');

});

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index'])
        ->middleware('auth')
        ->name('admin.index');
    Route::get('/usuarios',[ProfileController::class,'index'])
        ->middleware('auth')
        ->name('admin.index');
    Route::post('/usuarios/u',[ProfileController::class,'store'])
        ->middleware('auth')
        ->name('admin.index');
    Route::post('/usuarios/s',[ProfileController::class,'store_semestre'])
        ->middleware('auth')
        ->name('admin.index');
    Route::delete('/usuarios/{id}',[ProfileController::class,'destroy']);
    Route::post('/usuarios/edit',[ProfileController::class,'editarUsuario']);

});
Route::group(['prefix'=>'p','as'=>'p'],function(){
    Route::get('/', [ProfesorController::class,'resumen'])
        ->middleware('auth')
        ->name('admin.index'); 
    Route::get('/a', [ProfesorController::class,'actividades'])
        ->middleware('auth')
        ->name('admin.index');
    Route::delete('/{id}', [ProfesorController::class,'destroy'])
        ->middleware('auth')
        ->name('admin.index');
    
    Route::get('/{id}', [ProfesorController::class,'editPT'])
        ->middleware('auth')
        ->name('admin.index');
    Route::post('/{id}/st',[TareasController::class,'store_tareas']);
    Route::post('/{id}/et',[TareasController::class,'edit_tareas']);
    Route::post('/{id}/sst',[TareasController::class,'store_subtareas']);
    Route::post('/{id}',[ProfesorController::class,'store_actividades']);

    Route::get('/{id}/t', [ProfesorController::class,'backPT']);
    Route::post('/{id}/t', [ProfesorController::class,'tareas']);
});

Route::group(['prefix'=>'u','as'=>'usuario'],function(){
    Route::get('/', [EvaluadorController::class,'index']);
    Route::get('/login', [ProfileController::class,'login']);

    Route::get('/{id}', [EvaluadorController::class, 'verPTs']);

    
});
##DELETES!

Route::delete('/t/{idt}', [TareasController::class,'destroy']);
Route::delete('/a/{id}', [ProfesorController::class,'destroy_act']);

##END DELETES
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

