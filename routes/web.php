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



Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin/enlaces', 'EnlacesController@index')->middleware('auth')->name('admin.enlacess');
    Route::get('/enlaces/{enlace}', 'EnlacesController@show')->name('enlaces.show');
    Route::get('/crear', 'EnlacesController@create');
    Route::post('/crear', 'EnlacesController@store');
    Route::post('/crear/validar', 'Auth\RegisterController@validacionAjax');
});