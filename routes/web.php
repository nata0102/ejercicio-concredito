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

Route::get('/', 'MainController@index');
Route::resource('/captura', 'CustomerController');
Route::get('/evaluacion', 'MainController@evaluation');
Route::get('/listado', 'MainController@list');
Route::get('/realizar-evaluacion/{id}', 'CustomerController@showCustomer');
Route::put('/realizar-evaluacion/{id}', 'CustomerController@updateEvaluation');

Route::put('/autorizar/{id}', 'CustomerController@authorizeCustomer');
