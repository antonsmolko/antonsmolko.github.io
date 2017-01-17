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

Route::post('/administrator/users', 'UsersController@moveAdd')->name('admin.users');

Route::get('/administrator/users/add', 'UsersController@addGet')->name('admin.users.add');

Route::post('/administrator/users/add', 'UsersController@addPost')->name('admin.users.add');

Route::get('/administrator/users/edit/{id}', 'UsersController@editGet')->where('id', '[0-9]+')->name('admin.users.edit');

Route::post('/administrator/users/edit/{id}', 'UsersController@editPost')->where('id', '[0-9]+')->name('admin.users.edit');