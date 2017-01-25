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

Route::get('/', 'NewsController@indexAction')
    ->name('index');

Route::get('/new/{id}', 'NewsController@newAction')
    ->where('id', '[0-9]+');

Route::get('/add', 'NewsController@addAction');

Route::post('/add', 'NewsController@addAction');

Route::get('/edit/{id}', 'NewsController@editAction')
    ->where('id', '[0-9]+');

Route::post('/edit/{id}', 'NewsController@editAction')
    ->where('id', '[0-9]+');

Route::get('/delete/{id}', 'NewsController@deleteAction')
    ->where('id', '[0-9]+');

Route::get('/register', 'AuthController@register')
    ->name('register');

Route::post('/register', 'AuthController@registerPost')
    ->name('register');

Route::get('/login', 'AuthController@login')
    ->name('login');

Route::post('/login', 'AuthController@loginPost')
    ->name('login');

Route::get('/logout', 'AuthController@logout')
    ->name('logout');

// АДМИНКА

Route::group(['prefix' => 'administrator', 'middleware' => ['permission:admin_access']], function() {

    Route::get('/', 'AuthController@showAdmin')
        ->name('admin');

    Route::get('/users', ['middleware' => ['ability:super_admin|user_admin,view_users'], 'uses' => 'UsersController@show'])
        ->name('admin.users');

    Route::get('/users/create', ['middleware' => ['ability:super_admin|user_admin,create_users'], 'uses' => 'UsersController@create'])
        ->name('admin.users.create');

    Route::post('/users/create', ['middleware' => ['ability:super_admin|user_admin,create_users'], 'uses' => 'UsersController@createPost'])
        ->name('admin.users.create.post');

    Route::get('/users/edit/{id}', ['middleware' => ['ability:super_admin|user_admin,edit_users'], 'uses' => 'UsersController@edit'])
        ->where('id', '[0-9]+')
        ->name('admin.users.edit');

    Route::post('/users/edit/{id}', ['middleware' => ['ability:super_admin|user_admin,edit_users'], 'uses' => 'UsersController@editPost'])
        ->where('id', '[0-9]+')
        ->name('admin.users.edit.post');
});

//Route::get('/administrator', 'AuthController@checkAuth')
//    ->name('admin');

//Route::get('/administrator/users', 'UsersController@show')
//    ->name('admin.users');

//Route::post('/administrator/users', 'UsersController@moveAdd')->name('admin.users');

//Route::get('/administrator/users/add', 'UsersController@addGet')
//    ->name('admin.users.add');

//Route::post('/administrator/users/add', 'UsersController@addPost')
//    ->name('admin.users.add');

//Route::get('/administrator/users/edit/{id}', 'UsersController@editGet')
//    ->where('id', '[0-9]+')
//    ->name('admin.users.edit');

//Route::post('/administrator/users/edit/{id}', 'UsersController@editPost')
//    ->where('id', '[0-9]+')
//    ->name('admin.users.edit');

Route::get('/administrator/roles', 'RolesController@show')
    ->name('admin.roles');

Route::get('/administrator/roles/add', 'RolesController@addGet')
    ->name('admin.roles.add');

Route::post('/administrator/roles/add', 'RolesController@addPost')
    ->name('admin.roles.add');

Route::get('/administrator/roles/edit/{id}', 'RolesController@editGet')
    ->where('id', '[0-9]+')
    ->name('admin.roles.edit');

Route::post('/administrator/roles/edit/{id}', 'RolesController@editPost')
    ->where('id', '[0-9]+')
    ->name('admin.roles.edit');

Route::get('/administrator/articles', 'ArticleController@showList')
    ->name('admin.articles');

Route::get('/administrator/articles/add', 'ArticleController@addGet')
    ->name('admin.articles.add');

Route::post('/administrator/articles/add', 'ArticleController@addPost')
    ->name('admin.articles.add');

Route::get('/administrator/articles/edit/{id}', 'ArticleController@editGet')
    ->where('id', '[0-9]+')
    ->name('admin.articles.edit');

Route::post('/administrator/articles/edit/{id}', 'ArticleController@editPost')
    ->where('id', '[0-9]+')
    ->name('admin.articles.edit');