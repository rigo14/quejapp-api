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

Route::get('denuncias/estados', 'ComplaintController@states');
Route::get('denuncias', 'ComplaintController@index');
Route::get('denuncias/dependencias', 'ComplaintController@dependencies');
