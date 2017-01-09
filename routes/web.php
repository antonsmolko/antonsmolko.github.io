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

//Route::get('/', function () {
//    $users = new \App\Http\Controllers\NewsController();
//    $users->indexAction();
//});

Route::get('/', 'NewsController@indexAction');

Route::get('/login', 'UserController@loginAction');

//Route::get('/', function () {
//    return "Helloooooooo!";
//    $users = DB::table('users')->get();
//    foreach ($users as $user) {
//        echo $user->name;
//    }
//});
