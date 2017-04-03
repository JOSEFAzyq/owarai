<?php
//后台通用控制器
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    protected $userInfo;
    protected $role;
    protected $authority;

    public function __construct()
    {
        //本地自动登录咯
        if(false&&getenv('APP_ENV')=='local'){
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
        $this->authority=[
            [
                'title'=>'文章管理',
                'class'=>'fa fa-file-text fa-fw',
                'column'=>[
                    [
                        'title'=>'文章列表',
                        'action'=>URL::action('AdminController@articleList')
                    ],
                    [
                        'title'=>'文章发布',
                        'action'=>URL::action('AdminController@articlePublish')
                    ]
                ]
            ],
            [
                'title'=>'资讯管理',
                'class'=>'fa fa-dot-circle-o fa-fw',
                'column'=>[
                    [
                        'title'=>'轮播内容列表',
                        'action'=>URL::action('AdminController@carouselSelect')
                    ],
                    [
                        'title'=>'轮播内容添加',
                        'action'=>URL::action('AdminController@carouselAdd')
                    ]
                ]
            ],
            [
                'title'=>'字幕组管理',
                'class'=>'fa fa-group fa-fw',
                'column'=>[
                    [
                        'title'=>'字幕组列表',
                        'action'=>URL::action('AdminController@articleList')
                    ]
                ]
            ]
        ];
        //权限设置
        $this->role['subfan']=['文章管理'];
        $this->role['super']=['文章管理','资讯管理','字幕组管理'];
        \DB::enableQueryLog();
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function render($view,$data=[])
    {
        $data['authority']=$this->checkRole();
        $data['character']=session('userInfo')['character'];
        return view($view,$data);
    }

    /**
     * 检查权限,给出对应的侧边栏
     */
    public function checkRole()
    {
        $userInfo=session('userInfo');
        $role=$userInfo['character'];
        $authority=$this->role[$role];
        $tmp=[];
        foreach ($this->authority as $k=>$v){
            foreach ($authority as $value){
                if ($value==$v['title']){
                    $tmp[$k]=$v;
                }else{
                    foreach ($v['column'] as $column){
                        if($value==$column['title']){
                            $tmp[$k]['title']=$v['title'];
                            $tmp[$k]['class']=$v['class'];
                            $tmp[$k]['column'][]=$column;
                        }
                    }
                }
            }
        }
        return $tmp;

    }
}
