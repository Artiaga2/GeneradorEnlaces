<?php

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

Route::get('/', 'EnlacesController@index')->name('home');
Route::post('/enlaces/{enlace}/comentarios', 'ComentariosController@store');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin/enlaces', 'EnlacesController@index')->middleware('auth')->name('admin.enlacess');
    Route::get('/enlaces/{enlace}', 'EnlacesController@show')->name('enlaces.show');
    Route::get('/crear', 'EnlacesController@create');
    Route::post('/crear', 'EnlacesController@store');
    Route::get('/admin/enlaces/{enlace}/edit', 'EnlacesController@edit')->name('enlace.edit');
    Route::patch('/admin/enlaces/{enlace}', 'EnlacesController@patch')->name('enlaces.patch');
    Route::post('/crear/validar', 'Auth\RegisterController@validacionAjax');
    Route::delete('/enlaces/delete/{id}', 'EnlacesController@delete');
// Validación
    Route::post('/enlaces/validate', 'EnlacesController@validateEnlaceAjax');
    // Rutas de carga de datos asíncrona.
    Route::get('/data/mostrar_datos', 'EnlacesController@mostrarDatos');
    Route::get('/data/mostrarDatosAjax', 'EnlacesController@mostrarDatosAjax');
    Route::post('/data/mostrarAjaxUno', 'EnlacesController@mostrarAjaxUno');
});