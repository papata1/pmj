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
Route::resource('/service_fix','Service_fixController');
Route::get('/service_fix/excel/{a}','Service_fixController@excel');
Route::resource('/Fund_borrowing','Fund_borrowingController');
Route::get('/Fund_borrowing/excel/{a}','Fund_borrowingController@excel');
Route::resource('/Fund_enterpise','Fund_enterpiseController');
Route::get('/Fund_enterpise/excel/{a}','Fund_enterpiseController@excel');
Route::resource('/Fund_account','Fund_accountController');
Route::get('/Fund_account/excel/{a}','Fund_accountController@excel');
Route::get('/Fund_account/edit1/{a}','Fund_accountController@edit1');
Route::resource('/Fund_account_bill','Fund_account_billController');
Route::get('/Fund_account_bill/excel/{a}/{b}','Fund_account_billController@excel');
Route::resource('/Fund_debt','Fund_debtController');
Route::get('/Fund_debt/excel/{a}/{b}','Fund_debtController@excel');
Route::get('/Fund_debt/excel1/{a}','Fund_debtController@excel1');
Route::get('/Fund_debt/follow/{a}','Fund_debtController@follow');
Route::get('/Fund_debt/followedit/{a}','Fund_debtController@followedit');
Route::post('/Fund_debt/followedit/update_follow','Fund_debtController@update_follow');
Route::resource('/Fund_debt_all','Fund_debt_allController');
Route::get('/Fund_debt_all/excel/{a}','Fund_debt_allController@excel');
Route::resource('/Fund_debt_pass','Fund_debt_passController');
Route::resource('/Fund_debt_unpass','Fund_debt_unpassController');
Route::resource('/Fund_process','Fund_processController');
Route::resource('/Service_process','Service_processController');
Route::resource('/Fund_account_export','Fund_account_exportController');








