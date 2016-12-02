<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','LoginController@index' )->name('login.index');


Route::resource ('cliente','ClienteController' );
Route::resource ('articulo','ArticuloController' );
Route::resource ('empleado','EmpleadoController' );

//Login
Route::get('login', 'LoginController@index' )->name('login.index');
Route::post('login', 'LoginController@autenticar' )->name('login.autenticar');
Route::get('login/logout', 'LoginController@logout' )->name('login.logout');


