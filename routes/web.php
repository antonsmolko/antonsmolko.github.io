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

Route::get('/', 'ArticleController@showAll')
    ->name('index');

Route::get('/article/{id}', 'ArticleController@showOne')
    ->where('id', '[0-9]+')
    ->name('article');

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

Route::get('administrator/', 'AuthController@showAdmin')
    ->name('admin');

Route::group(['prefix' => 'administrator', 'namespace' => 'Admin', 'middleware' => ['permission:admin_access']], function() {

    Route::get('/users', ['middleware' => ['ability:super_admin|user_admin,view_users'], 'uses' => 'UserController@showAll'])
        ->name('admin.users');

    Route::get('/users/create', ['middleware' => ['ability:super_admin|user_admin,create_users'], 'uses' => 'UserController@create'])
        ->name('admin.users.create');

    Route::post('/users/create', ['middleware' => ['ability:super_admin|user_admin,create_users'], 'uses' => 'UserController@createPost'])
        ->name('admin.users.create.post');

    Route::get('/users/edit/{id}', ['middleware' => ['ability:super_admin|user_admin,edit_users'], 'uses' => 'UserController@edit'])
        ->where('id', '[0-9]+')
        ->name('admin.users.edit');

    Route::post('/users/edit/{id}', ['middleware' => ['ability:super_admin|user_admin,edit_users'], 'uses' => 'UserController@editPost'])
        ->where('id', '[0-9]+')
        ->name('admin.users.edit.post');

    Route::get('/roles', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RoleController@showAll'])
        ->name('admin.roles');

    Route::get('/roles/create', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RoleController@create'])
        ->name('admin.roles.create');

    Route::post('/roles/create', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RoleController@createPost'])
        ->name('admin.roles.createPost');

    Route::get('/roles/edit/{id}', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RoleController@edit'])
        ->where('id', '[0-9]+')
        ->name('admin.roles.edit');

    Route::post('/roles/edit/{id}', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RoleController@editPost'])
        ->where('id', '[0-9]+')
        ->name('admin.roles.editPost');

    Route::get('/articles', ['middleware' => ['ability:super_admin|article_admin|author|editor,create_articles|edit_articles|publish_articles|delete_articles'], 'uses' => 'ArticleController@showAll'])
        ->name('admin.articles');

    Route::get('/articles/create', ['middleware' => ['ability:super_admin|article_admin|author,create_articles'], 'uses' => 'ArticleController@create'])
        ->name('admin.articles.create');

    Route::post('/articles/create', ['middleware' => ['ability:super_admin|article_admin|author,create_articles'], 'uses' => 'ArticleController@createPost'])
        ->name('admin.articles.create.post');

    Route::get('/articles/edit/{id}', ['middleware' => ['ability:super_admin|article_admin|editor,edit_articles'], 'uses' => 'ArticleController@edit'])
        ->where('id', '[0-9]+')
        ->name('admin.articles.edit');

    Route::post('/articles/edit/{id}', ['middleware' => ['ability:super_admin|article_admin|editor,edit_articles'], 'uses' => 'ArticleController@editPost'])
        ->where('id', '[0-9]+')
        ->name('admin.articles.edit.post');
});

// API

Route::group(['prefix' => 'api'], function() {

    Route::group(['namespace' => 'Api\Admin', 'middleware' => ['permission:admin_access']], function() {

        Route::post('/article/activate', ['middleware' => ['ability:super_admin|article_admin,publish_articles'], 'uses' => 'ArticleController@activate'])
            ->name('api.article.activate');

        Route::post('/article/delete', ['middleware' => ['ability:super_admin|article_admin,delete_articles'], 'uses' => 'ArticleController@delete'])
            ->name('api.article.delete');

        Route::post('/user/activate', ['middleware' => ['ability:super_admin|user_admin,activate_users'], 'uses' => 'UserController@activate'])
            ->name('api.user.activate');

        Route::post('/user/delete', ['middleware' => ['ability:super_admin|user_admin,delete_users'], 'uses' => 'UserController@delete'])
            ->name('api.user.delete');

        Route::post('/role/delete', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RoleController@delete'])
            ->name('api.role.delete');
    });
});