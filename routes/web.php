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


Route::get('/', 'LoginController@index');

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('register', 'RegisterController@index');
Route::post('/register/create', 'RegisterController@store');



/*
|--------------------------------------------------------------------------
| Admin route
|--------------------------------------------------------------------------
*/

Route::group(['prefix'=>'admin','middleware' =>'auth'], function () {

Route::get('/', 'AdminController@index');
});
