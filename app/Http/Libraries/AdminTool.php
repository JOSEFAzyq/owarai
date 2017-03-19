<?php
namespace App\Http\Libraries;
use App\Http\Models\Article;

/**
 * Created by PhpStorm.
 * User: @Josefa
 * Date: 2017/3/19 0019
 * Time: 22:37
 */

class AdminTool{
    public function articleDataTable($request)
    {
        $rs=Article::where('id','10')->first();
        return $rs;
    }
}