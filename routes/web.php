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

//home
Route::get('home','HomeController@index');
//article
Route::get('article/detail','ArticleController@detail');



//admin 需要验证权限的页面
Route::group(['prefix'=>'admin','middleware'=>'checkAdmin'],function(){
	Route::get('index','AdminController@index');
	Route::get('articlePublish','AdminController@articlePublish');
	Route::post('articlePublish','AdminController@articleHandle');
	Route::get('articleList','AdminController@articleList');
    Route::get('userInfo','AdminController@userInfo');
	//文章接口
    Route::get('article/list','AdminController@articleList_get');
});

//admin 不需要验证权限
Route::group(['prefix'=>'admin'],function(){
	Route::get('login','AdminController@login');
	Route::get('test','AdminController@test');
	Route::get('logout','AdminController@logOut');

	Route::post('checklogin','AdminController@checkLogin');
});