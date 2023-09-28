<?php

use App\Http\Controllers\PersonasController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[PersonasController::class,'index'])->name('personas.index');//Mostrar datos y vista general
Route::get('/create',[PersonasController::class,'create'])->name('personas.create');//Vista guardar
Route::post('/store',[PersonasController::class,'store'])->name('personas.store');//Guardar, Proceso
Route::post('/show',[PersonasController::class, 'show'])->name('personas.show');//Eliminar, PROCESO
Route::get('/edit/{id}',[PersonasController::class, 'edit'])->name('personas.edit');//Proceso busqueda y mandar vista
Route::get('/vistaUpdate',[PersonasController::class, 'vistaUpdate'])->name('personas.vistaUpdate');//Vista actualizar
Route::put('/update/{id}',[PersonasController::class, 'update'])->name('personas.update');//Proceso actualizar


