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


Route::get('admin/login','AdminController@login');
Route::get('admin/test','AdminController@test');
Route::group(['prefix'=>'admin','middleware'=>'checkAdmin'],function(){
	Route::get('index','AdminController@index');
	Route::get('articlePublish','AdminController@articlePublish');
});