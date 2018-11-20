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

Route::get('form', 'FormController@index');
Route::get('form/create', 'FormController@add');
Route::post('form/save', 'FormController@save');
Route::post('form/delete', 'FormController@delete');
