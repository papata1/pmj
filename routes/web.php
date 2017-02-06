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
Route::resource('/Fund_borrowing','Fund_borrowingController');
Route::resource('/Fund_enterpise','Fund_enterpiseController');
Route::resource('/Fund_account','Fund_accountController');
Route::resource('/Fund_account_bill','Fund_account_billController');
Route::resource('/Fund_debt','Fund_debtController');
Route::resource('/Fund_debt_all','Fund_debt_allController');
Route::resource('/Fund_debt_pass','Fund_debt_passController');
Route::resource('/Fund_debt_unpass','Fund_debt_unpassController');
Route::resource('/Fund_process','Fund_processController');
Route::resource('/Service_process','Service_processController');




