<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home','HomeController@index');


//admin
Route::group(['prefix'=>'admin','middleware'=>'checkAdmin'],function(){
	Route::get('index','AdminController@index');
	Route::get('articlePublish','AdminController@articlePublish');
});
Route::group(['prefix'=>'admin'],function(){
	Route::get('login','AdminController@login');
	Route::get('test','AdminController@test');
	Route::get('logout','AdminController@logOut');

	Route::post('checklogin','AdminController@checkLogin');
});