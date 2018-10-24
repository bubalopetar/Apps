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

// vrati sve valute
Route::middleware('auth:api')->get('valute','ValutaController@get_all'); 

// vrati jednu valutu preko id
Route::middleware('auth:api')->get('valuta/{id}','ValutaController@get_valute_id');

// dodaj valutu
Route::middleware('auth:api')->post('valuta','ValutaController@add_valute');

// promjeni
Route::middleware('auth:api')->put('valuta','ValutaController@update_valute');

Route::middleware('auth:api')->delete('valuta','ValutaController@delete');
