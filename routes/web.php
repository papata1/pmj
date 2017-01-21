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
/*Route::get('/', function () {
    return view('admin.dashboard.index');
});*/
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::get('/', 'HomeController@index');
Route::resource('/user','UserController');
Route::resource('/category','CategoryController');
Route::resource('/service','ServiceController');


