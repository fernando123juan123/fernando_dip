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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'ControllerSistema@index')->name('sistema.index');
Route::get('/adminDocente', 'ControllerSistema@index')->name('sistema.index');
// Route::put('/eliminar_doc', 'ControllerSistema@eliminar_doc')->name('sistema.eliminar_doc');
Route::get('/nuevoDocente', 'ControllerSistema@nuevoDocente')->name('sistema.nuevoDocente');
Route::post('/guardarNuevoPersona', 'ControllerSistema@guardarNuevoPersona')->name('sistema.guardarNuevoPersona');
Route::get('/editarDocente/{id}', 'ControllerSistema@editarDocente')->name('sistema.editarDocente');
Route::post('/guardarEditarPersona', 'ControllerSistema@guardarEditarPersona')->name('sistema.guardarEditarPersona');

Route::post('/eliminar_doc', 'ControllerSistema@eliminar_doc')->name('sistema.eliminar_doc');
Route::post('/estado_doc', 'ControllerSistema@estado_doc')->name('sistema.estado_doc');

Route::get('/reportePdf', 'ControllerSistema@reportePdf')->name('sistema.reportePdf');
Route::get('/reporteExcel', 'ControllerSistema@reporteExcel')->name('sistema.reporteExcel');