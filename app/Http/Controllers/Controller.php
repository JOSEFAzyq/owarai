<?php
//后台通用控制器
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    protected $userInfo;
    protected $role;
    protected $authority;

    public function __construct()
    {
        //本地自动登录咯
        if(getenv('APP_ENV')=='local'){
            session(['userInfo'=>[
                'id'=>1,
                'user_name'=>'OwaraiClub',
                'password'=>'93a637fb7cd4343af8ca539093aeec5a',
                'bbs_child_id'=>0,
                'fansub_id'=>0,
                'sensitive_auth'=>'',
                'character'=>'super',
                'created_at'=>'2017-03-14 22:00:18',
                'updated_at'=>'2017-03-14 22:00:20'
            ]]);
        }
        $this->userInfo=session('userInfo');
        $this->authority=[
            [
                'title'=>'文章管理',
                'class'=>'fa fa-file-text fa-fw',
                'column'=>[
                    [
                        'title'=>'文章列表',
                        'action'=>'URL::action(\'AdminController@articleList\')'
                    ],
                    [
                        'title'=>'文章发布',
                        'action'=>'URL::action(\'AdminController@articlePublish\')'
                    ]
                ]
            ],
            [
                'title'=>'资讯管理',
                'class'=>'fa fa-dot-circle-o fa-fw',
                'column'=>[
                    [
                        'title'=>'轮播内容',
                        'action'=>'URL::action(\'AdminController@articleList\')'
                    ],
                    [
                        'title'=>'资源内容',
                        'action'=>'URL::action(\'AdminController@articleList\')'
                    ]
                ]
            ],
            [
                'title'=>'字幕组管理',
                'class'=>'fa fa-group fa-fw',
                'column'=>[
                    [
                        'title'=>'字幕组列表',
                        'action'=>'URL::action(\'AdminController@articleList\')'
                    ]
                ]
            ]
        ];
        //权限设置
        $this->role['funSubAdmin']=[['title'=>'文章管理']];
        \DB::enableQueryLog();
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function render($view,$data=[])
    {
        $this->checkRole();
        return view($view,$data);
    }

    /**
     * 检查权限,给出对应的侧边栏
     */
    public function checkRole()
    {
        $userInfo=$this->userInfo;
        $role=$userInfo['character'];


    }
}
