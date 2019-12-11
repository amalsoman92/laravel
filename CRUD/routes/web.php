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

Auth::routes(['verify' => true]);
Route::any('search','StudentController@search_name');
Route::any('full_name_search','StudentController@search_full_name');
Route::any('email_search','StudentController@search_email');
Route::resource('students','StudentController');
