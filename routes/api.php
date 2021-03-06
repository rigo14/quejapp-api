<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('denuncias', 'API\ComplaintController')->only(['compoundData', 'index', 'create', 'store']);
Route::get('denuncias', 'API\ComplaintController@compoundData');
Route::post('denuncias', 'API\ComplaintController@store');
