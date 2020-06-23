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

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/home', function () {
    return view('home');
})->name('home');

//RUTAS PARA ESTUDIANTES
Route::get('estudiantes', 'EstudianteController@index')->name('estudiantes.index');
Route::get('/registro-estudiantes', 'EstudianteController@register')->name('estudiantes.registro');


//EDITAR

Route::get('estudiantes/{id}', 'EstudianteController@getDates')->name('estudiantes.getDates');

Route::post('estudiantes-editar', 'EstudianteController@edit')->name('estudiantes.edit');

//ELIMINAR
Route::get('estudiantes/{id}/destroy', 'EstudianteController@destroy')->name('estudiantes.destroy');


//
Route::post('/registro-estudiantes-post', 'EstudianteController@store')->name('estudiantes.store');

//buscar
Route::get('estudiantes-buscar', 'EstudianteController@search')->name('estudiantes.search');


//RUTAS PARA MATERIAS
Route::get('materias', 'MateriaController@index')->name('materias.index');
Route::get('materias/registro', 'MateriaController@register')->name('materias.registro');

//AGREGAR
Route::post('/registros-materias-post', 'MateriaController@store')->name('materias.store');


//EDITAR

Route::get('materias/{id}', 'MateriaController@getDates')->name('materias.getDates');

Route::post('materias-editar', 'MateriaController@edit')->name('materias.edit');

//ELIMINAR

route::get('materias/{id}/destroy', 'MateriaController@destroy')->name('materias.destroy');


//

Auth::routes(['register' => false]);



//Estudiantes- Materias
Route::get('lista-materia', 'EstudianteMateriaController@index')->name('est-mat.index');


Route::get('tomar-materia/{id}', 'EstudianteMateriaController@getDates')->name('est-mat.getDates');

//
Route::post('/tomar-estudiantes-post', 'EstudianteMateriaController@store')->name('estudiantesMateria.store');
