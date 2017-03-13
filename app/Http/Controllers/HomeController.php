<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //主页
	public function index()
	{
		return view('admin.index');
	}

	//主页
	public function login()
	{
		return view('admin.login');
	}
}
