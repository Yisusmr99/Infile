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


Route::resource('product',       'UsuariosController');
Route::resource('user',          'UserController');
Route::any('principal',          'UserController@principal');
Route::get('ver/{id}',           'UserController@ver');
Route::delete('eliminar/{id}',      'UserController@eliminar');


// Route::group(['prefix' => 'ws'], function () {

//     Route::get('/user',	            'UserController@index');
//     Route::post('/user/create',	    'UserController@store');

// });