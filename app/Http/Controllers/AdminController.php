<?php

namespace App\Http\Controllers;


use App\Http\Models\Admin;
use App\Http\Models\Article;
use App\Http\Models\User;

class AdminController extends Controller
{
    //登录
	public function login()
	{
		return view('admin.login');
	}

	public function index()
	{
		return view('admin.index');
	}

	/*
	 * 文章发布
	 * */
	public function articlePublish()
	{
		return view('admin.articlePublish');
	}

	public function test()
	{

		/*$salt='josefa';
		$password='soragaaoina.';
		$str=md5($password.$salt);
		var_dump($str);*/
		/*factory(Article::class,'article', 50)->create()->each(function($u) {
			$u->posts()->save(factory('App\Post')->make());
		});*/

		/*\DB::table('admin')->insert([
			'name' => str_random(10),
			'email' => str_random(10).'@gmail.com',
			'password' => bcrypt('secret'),
		]);*/
		/*$user=factory(User::class)->create();
		var_dump($user);*/

		/*$admin=new Admin;
		$admin->user_name='test';
		$admin->password='123';
		$admin->save();*/

		//factory(User::class)->create();

		factory(Article::class,'article')->create();


	}
}
