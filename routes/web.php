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

         Route::group(['prefix'=>'manage'], function () {
              Route::get('/', 'Admin\AdminController@manageuser');

               Route::group(['prefix'=>'user'], function () {

                  Route::get('delete{id}', 'Admin\AdminController@getdelete');
                  Route::get('block{id}', 'Admin\AdminController@getblock');
                  Route::get('unblock{id}', 'Admin\AdminController@getunblock');
                  Route::get('accessaccount/{id}', 'Admin\AdminController@accessaccount');
                  Route::get('back{id}', 'Admin\AdminController@getback');
                  Route::get('create', 'Admin\AdminController@create');
                  Route::post('store', 'Admin\AdminController@store');
                  Route::get('edit/{id}', 'Admin\AdminController@getedit');
                  Route::post('update', 'Admin\AdminController@updateuser');
                  Route::get('viewprofile/{id}', 'Admin\AdminController@getprofile');
                });
            });
          });


             Route::group(['prefix'=>'employee','middleware' =>'auth'], function () {


                 Route::get('/', 'Admin\EmployeeController@manageemployee');
                 Route::get('create', 'Admin\EmployeeController@employeecreate');
                 Route::post('store', 'Admin\EmployeeController@employeestore');
                 Route::get('delete/{id}', 'Admin\EmployeeController@employeedelete');
                 Route::get('edit/{id}', 'Admin\EmployeeController@employeeedit');
                 Route::post('update', 'Admin\EmployeeController@employeeupdate');
                 Route::get('viewprofile/{id}', 'Admin\EmployeeController@employeeview');
                 Route::post('action', 'Admin\EmployeeController@employeeaction');
                

          });




Route::group(['prefix'=>'user','middleware' =>'auth'], function () {
      Route::get('/', 'User\UserController@index');


});
