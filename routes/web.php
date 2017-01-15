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

Route::get('/', 'NewsController@indexAction');

Route::get('/login', 'UsersController@loginAction');

Route::get('/new/{id}', 'NewsController@newAction')->where('id', '[0-9]+');

Route::get('/add', 'NewsController@addAction');

Route::post('/add', 'NewsController@addAction');

Route::get('/edit/{id}', 'NewsController@editAction')->where('id', '[0-9]+');

Route::post('/edit/{id}', 'NewsController@editAction')->where('id', '[0-9]+');

Route::get('/delete/{id}', 'NewsController@deleteAction')->where('id', '[0-9]+');

Route::get('/administrator', 'UsersController@checkPermission')->name('admin');

Route::get('/administrator/users', 'UsersController@showUsers')->name('admin.users');
