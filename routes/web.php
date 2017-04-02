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

//resource
Route::resource('article', 'Services\ArticleController');

//admin
Route::group(['prefix'=>'admin','middleware'=>'checkAdmin'],function(){
	Route::get('index','AdminController@index');
	Route::get('articlePublish','AdminController@articlePublish');
	Route::post('articlePublish','AdminController@articleHandle');
	Route::get('articleList','AdminController@articleList');

	//轮播
	Route::get('carouselAdd','AdminController@carouselAdd');
	Route::any('doCarouselAdd','AdminController@doCarouselAdd');
	Route::get('carouselSelect','AdminController@carouselSelect');
	Route::any('doCarouselSelect','AdminController@doCarouselSelect');
	Route::get('carouselConfig','AdminController@carouselConfig');
	Route::any('doCarouselConfig','AdminController@doCarouselConfig');
	Route::any('carouselDelete','AdminController@carouselDelete');

    //字幕组管理
    Route::any('addSubTitleGroupAccount','AdminController@addSubTitleGroupAccount');
    Route::any('doAddSubTitleGroupAccount','AdminController@doAddSubTitleGroupAccount');
    Route::any('subTitleGroupAccountList','AdminController@subTitleGroupAccountList');
    Route::any('updateSubTitleGroup','AdminController@updateSubTitleGroup');
    Route::any('doUpdateSubTitleGroup','AdminController@doUpdateSubTitleGroup');
    Route::any('deleteSubTitleGroup','AdminController@deleteSubTitleGroup');

    Route::any('addSubTitleGroup','AdminController@addSubTitleGroup');
    Route::any('doAddSubTitleGroup','AdminController@doAddSubTitleGroup');
    Route::any('subTitleGroupList','AdminController@subTitleGroupList');
    Route::any('updateSubTitleGroupAccount','AdminController@updateSubTitleGroupAccount');
    Route::any('doUpdateSubTitleGroupAccount','AdminController@doUpdateSubTitleGroupAccount');
    Route::any('deleteSubTitleGroupAccount','AdminController@deleteSubTitleGroupAccount');

	//文章接口
    Route::get('article/list','AdminController@articleList_get');
});

Route::group(['prefix'=>'admin'],function(){
	Route::get('login','AdminController@login');
	Route::get('test','AdminController@test');
	Route::get('logout','AdminController@logOut');

	Route::post('checklogin','AdminController@checkLogin');
});