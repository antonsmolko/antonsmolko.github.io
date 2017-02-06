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

Route::group(['prefix' => 'administrator', 'middleware' => ['permission:admin_access']], function() {

    Route::get('/', 'AuthController@showAdmin')
        ->name('admin');

    Route::get('/users', ['middleware' => ['ability:super_admin|user_admin,view_users'], 'uses' => 'UsersController@show'])
        ->name('admin.users');

    Route::post('/users/activate', ['middleware' => ['ability:super_admin|user_admin,activate_users'], 'uses' => 'UsersController@activate'])
        ->name('admin.users.activate');

    Route::post('/users/delete', ['middleware' => ['ability:super_admin|user_admin,delete_users'], 'uses' => 'UsersController@delete'])
        ->name('admin.users.delete');

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

    Route::get('/roles', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RolesController@show'])
        ->name('admin.roles');

    Route::post('/roles/delete', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RolesController@delete'])
        ->name('admin.roles.delete');

    Route::get('/roles/create', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RolesController@create'])
        ->name('admin.roles.create');

    Route::post('/roles/create', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RolesController@createPost'])
        ->name('admin.roles.createPost');

    Route::get('/roles/edit/{id}', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RolesController@edit'])
        ->where('id', '[0-9]+')
        ->name('admin.roles.edit');

    Route::post('/roles/edit/{id}', ['middleware' => ['ability:super_admin,create_edit_delete_roles'], 'uses' => 'RolesController@editPost'])
        ->where('id', '[0-9]+')
        ->name('admin.roles.editPost');

    Route::get('/articles', ['middleware' => ['ability:super_admin|article_admin|author|editor,create_articles|edit_articles|publish_articles|delete_articles'], 'uses' => 'ArticleController@show'])
        ->name('admin.articles');

    Route::post('/articles/activate', ['middleware' => ['ability:super_admin|article_admin,publish_articles'], 'uses' => 'ArticleController@activate'])
        ->name('admin.articles.activate');

    Route::post('/articles/delete', ['middleware' => ['ability:super_admin|article_admin,publish_articles'], 'uses' => 'ArticleController@delete'])
        ->name('admin.articles.delete');

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



//Route::get('/administrator/roles/edit/{id}', 'RolesController@editGet')
//    ->where('id', '[0-9]+')
//    ->name('admin.roles.edit');
//
//Route::post('/administrator/roles/edit/{id}', 'RolesController@editPost')
//    ->where('id', '[0-9]+')
//    ->name('admin.roles.edit');

//Route::get('/administrator/articles', 'ArticleController@showList')
//    ->name('admin.articles');

//Route::get('/administrator/articles/add', 'ArticleController@addGet')
//    ->name('admin.articles.add');
//
//Route::post('/administrator/articles/add', 'ArticleController@addPost')
//    ->name('admin.articles.add');

//Route::get('/administrator/articles/edit/{id}', 'ArticleController@editGet')
//    ->where('id', '[0-9]+')
//    ->name('admin.articles.edit');
//
//Route::post('/administrator/articles/edit/{id}', 'ArticleController@editPost')
//    ->where('id', '[0-9]+')
//    ->name('admin.articles.edit');

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

//Route::get('/administrator/roles', 'RolesController@show')
//    ->name('admin.roles');

//Route::get('/administrator/roles/add', 'RolesController@addGet')
//    ->name('admin.roles.add');
//
//Route::post('/administrator/roles/add', 'RolesController@addPost')
//    ->name('admin.roles.add');