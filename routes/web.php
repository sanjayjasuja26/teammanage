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

Route::get('/', 'Admin\AdminController@index');

Route::get('/manage', 'Admin\AdminController@manageuser');
Route::get('/manage/delete{id}', 'Admin\AdminController@getdelete');
Route::get('/manage/block{id}', 'Admin\AdminController@getblock');
Route::get('/manage/unblock{id}', 'Admin\AdminController@getunblock');
Route::get('/manage/editaccount{id}', 'Admin\AdminController@editaccount');
});
