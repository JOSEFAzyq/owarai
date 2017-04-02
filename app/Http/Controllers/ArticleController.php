<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends PcsiteController
{
    //
    public function detail()
    {

        return view('article.detail');
    }
}
