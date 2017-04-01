<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends PcsiteController
{
    //主页
	public function index()
	{
		return view('home.index');
	}

}
