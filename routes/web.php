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

Route::get('/', function () {
    return view('welcome');
});

//CRUD Pacientes
Route::get('/paciente' , 'PacienteController@index')->name('paciente');
Route::get('/paciente/create' , 'PacienteController@create');
Route::post('/paciente' , 'PacienteController@store');
Route::delete('/paciente/{id}','PacienteController@destroy'); //vista para eliminar
Route::get('/paciente/{id}','PacienteController@show'); //mostrar el tipo de movimiento
Route::get('/paciente/{id}/edit' , 'PacienteController@edit');
Route::post('/paciente/{id}/edit' , 'PacienteController@update');

Route::get('/municipio/search/{id}' , 'MunicipioController@search');
