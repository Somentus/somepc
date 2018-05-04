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

Auth::routes();

Route::get('/home', 'BuildsController@index')->name('home');
Route::get('/', 'BuildsController@index');

Route::get('/builds/create', 'BuildsController@create')->name('createBuild');
Route::get('/builds/{build}', 'BuildsController@show');

Route::post('/builds', 'BuildsController@store');
