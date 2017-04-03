<?php
/*
 * 渲染视图的控制器写在上方,接口写在下方,可以通用的功能写用library封装
 * */
namespace App\Http\Controllers;


use App\Http\Models\Admin;
use App\Http\Models\Article;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use App\Http\Libraries\AdminTool;
use App\http\Models\Carousel;

class AdminController extends Controller
{

	protected $admin;

	public function __construct()
	{
	    parent::__construct();
		$this->admin=new Admin();
	}

    //登录
	public function login(Request $request)
	{
		if($this->admin->checkLogin($request)){
			return redirect('admin/index');
		}
		return view('admin.login');
	}

	//登出
	public function logOut()
	{
		session()->forget('userInfo');
		return redirect('admin/login');
	}

    //验证
	public function checkLogin(Request $request)
	{
        Log::info('user try to login admin,info=>'.json_encode(Input::get()));
        $rs=$this->admin->checkLogin($request);
        if ($rs){
            return redirect('admin/index');
        }else{
            return redirect('admin/login');
        }

	}

	public function index()
	{
        return $this->render('admin.index');
	}

	//文章列表
	public function articleList()
	{
		return $this->render('admin.articleList');
	}

	/*
	 * 文章发布
	 * */
	public function articlePublish($id=0)
	{
	    dd($id);
		return $this->render('admin.articlePublish');
	}

	//文章处理
    public function articleHandle()
    {
		$articleData=Input::get();
		foreach ($articleData as $k=>$v){
			if($v=='on'){
				$articleData[$k]=1;
			}
		}
		$articleData['user_id']=1;
		$rs=Article::create($articleData);
		if($rs){
			return redirect('admin/articleList');
		}else{
			return '发布失败咯';
		}
	}

	//文章列表接口
    public function articleList_get(Request $request)
    {
        $data['draw']=$request->get('draw');
        $start=$request->get('start');
        $length=$request->get('length');
        $rs=Article::select('id','title','content','status','view','created_at')->offset($start)->limit($length)->get()->toArray();
        foreach ($rs as $k=>$v){
            $rs[$k]['content']=mb_substr($v['content'],0,40).'...';
        }
        $data['recordsTotal']=Article::count();
        $data['recordsFiltered']=Article::count();
        $data['data']=$rs;
        echo json_encode($data);
    }
    
    //用户信息
    public function userInfo()
    {
        echo 'userInfo';
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

		/*factory(Article::class,'article')->create();*/
		/*$articles=Article::all();
		foreach ($articles as $article){
			echo $article->title;
		}*/

		/*$article=Article::where('id',7)->first();
		var_dump($article);*/

		/*$article=Article::where('id','<',15)->get();
		var_dump($article);*/

		/*Admin::test();*/
		//var_dump(route('home'));
//        $rs=Article::all();
//        var_dump($rs);
        var_dump(md5('ogirijosefa.'));
	}




    /**
     * 添加轮播图展示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function carouselAdd()
    {
        return $this->render('admin.carouselAdd');
    }

    /**
     * 添加轮播图
     * @return string
     */
    public function doCarouselAdd()
    {

        $file = 'avatar_file';

        $allowTypes = ['image/jpeg','image/png'];

        if($_FILES[$file]['size'] > 5*1024*1024)
            return $this->reJson(0,'图片过大');

        if(!in_array($_FILES[$file]['type'],$allowTypes))
            return $this->reJson(0,'图片类型错误');


        $newDir = public_path().'/upload/carousel';

        if (!file_exists($newDir))
        {
            mkdir($newDir);
            chmod($newDir,"0777");
        }


        $upload = new  \App\Http\Libraries\UploadCropImage(['w'=>Input::get('c_width')?:100,'h'=>Input::get('c_height')?:100], $_POST['avatar_data'], $_FILES['avatar_file'],$newDir);

        $uploadMsg      = $upload -> getMsg();

        if ($uploadMsg != '')
            return $this->reJson(0,$uploadMsg);

        $uploadFileName = $upload -> getResult();


        $data =
            [

                'name'=>Input::get('c_title'),
                'url'=>$uploadFileName,
                'order'=>0,
                'status'=>2,
                'author'=>\session('user_name')?:'Someone',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),

            ];


        $insert = Carousel::create($data);

        if($insert)
            return $this->reJson(1,'添加成功');
        else
            return $this->reJson(0,'插入数据库失败');

    }

    /**
     * 轮播图查询页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function carouselSelect()
    {
        return $this->render('admin.carouselList');
    }

    /**
     * 轮播图查询页面ajax接口
     * @param Request $request
     * @return string
     */
    public function doCarouselSelect(Request $request)
    {


        $start=$request->get('start');
        $length=$request->get('length');


        $rs = Carousel::select('name','url','order','status','created_at','id')->offset($start)->limit($length)->orderBy('id','DESC')->get()->toArray();

        foreach ($rs as $k=>$v)
        {
            $rs[$k]['url'] = url('upload/carousel/').'/'.$v['url'];
        }

        $data['draw'] = Input::get('draw');
        $data['recordsTotal'] = Carousel::count();
        $data['recordsFiltered'] = Carousel::count();
        $data['data'] =$rs;
        return json_encode($data);



    }

    /**
     * 轮播图配置页面，这里使用order方式排序 不如 使用类似指针方式实现好，但是 数量不多，不会影响太大
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function carouselConfig()
    {
        $id = Input::get('id')?:1;


        $carousel = Carousel::find(['id'=>$id]);
        $carousel = $carousel->toArray()[0];
        $exist    = Carousel::inUse()->count();

        $carousel['exist'] = $exist;

        return $this->render('admin.carouselConfig',['carousel'=>$carousel]);
    }

    /**
     * 轮播图配置
     * @return string
     */
    public function doCarouselConfig()
    {
        $id = Input::get('c_id');
        $status = Input::get('c_status');
        $pre_status = Input::get('pre_c_status');
        $max_number = Input::get('max_number');
        $order = Input::get('order');
        $pre_order = Input::get('pre_order');
        $name = Input::get('c_title');

        if (!$id || !$status || !$name)
        {
            return $this->reJson(0,'参数不足');
        }


        if (!($pre_status == 1 && $status == 1))
        {
            //如果是新增
            $order = $order <= 1 ? 1 :$order;
            $order = $order >= $max_number ? $max_number + 1 : $order;
        }
        else
        {
            //如果只是修改顺序，且已经上线
            $order = $order <= 1 ? 1 :$order;
            $order = $order >= $max_number ? $max_number : $order;
        }



        //这一条数据本身之外需要更新的数据
        $forUpdateItems = [];

        //原来没上线，改成上线了
        if ($status == 1 && $pre_status == 2)
        {
            $items = Carousel::where('status',1)->select('id','order')->orderBy('order')->get()->toArray();
            if ($max_number > $order)
            {
                foreach ($items as $k=>$v)
                {
                    if ($v['id'] == $id) continue;

                    if($items[$k]['order'] >= $order)
                    {
                        $forUpdateItems[] = ['id'=>$v['id'],'order'=>$items[$k]['order'] + 1 ];
                    }
                }
            }
        }

        //原来上线了，改成没上线
        if ($status == 2 && $pre_status == 1)
        {
            $items = Carousel::where('status',1)->select('id','order')->orderBy('order')->get()->toArray();
            foreach ($items as $v)
            {
                if ($v['id'] == $id) continue;

                if ($v['order'] >= $order)
                {
                    $forUpdateItems[] = ['id'=>$v['id'],'order'=>$v['order'] - 1 ];
                }
            }
        }

        //原来上线，后来也上线,只是修改了顺序
        if ($status == 1 && $pre_status == 1)
        {
            if ($order != $pre_order)
            {

                $items = Carousel::where('status',1)->select('id','order')->orderBy('order')->get()->toArray();
                $i     = 1;

                //先把数据去除要改变的数据，把order重置成12345 连续的顺序
                foreach ($items as $k=>$v)
                {
                    if ($v['id'] == $id)
                    {
                        unset($items[$k]);
                        continue;
                    }

                    $items[$k]['order']  = $i;
                    $i++;

                }

                //按照新增操作
                foreach ($items as $k=>$v)
                {
                    if($v['order'] >= $order)
                        $forUpdateItems[] = ['id'=>$v['id'],'order'=>$items[$k]['order'] + 1 ];
                    else
                        $forUpdateItems[] = ['id'=>$v['id'],'order'=>$items[$k]['order']];
                }


            }

        }

        if ($forUpdateItems)
        {

            DB::beginTransaction();
            try{
                foreach ($forUpdateItems as $v)
                {
                    Carousel::where('id',$v['id'])->update(['order'=>$v['order'],'updated_at'=>date('Y-m-d H:i:s')]);
                }
            }
            catch (Exception $e)
            {
                DB::rollback();
                return $this->reJson(0,$e->getMessage());
            }
            DB::commit();


        }

        Carousel::where('id',$id)->update(['order'=>$order,'status'=>$status,'name'=>$name,'updated_at'=>date('Y-m-d H:i:s')]);

        return $this->reJson(1,'修改成功');

    }

    /**
     * 删除轮播图
     * @return string
     */
    public function carouselDelete()
    {
        $id = Input::get('id');

        if (!$id)
            return $this->reJson(0,'参数不足');

        $item = Carousel::where('id',$id)->select('url')->get()->toArray()[0];

        if (!$item)
            return $this->reJson(0,'当前项不存在');

        if (is_file(public_path('upload/carousel').'/'.$item['url']))
            unlink(public_path('upload/carousel').'/'.$item['url']);

        return Carousel::where('id',$id)->delete() ? $this->reJson(1,'删除成功') : $this->reJson(0,'删除失败');

    }

    /**
     * 以json格式返回数组，简写
     * @param int $status
     * @param string $msg
     * @param string $data
     * @return string
     */
    private function reJson($status = 0,$msg = '',$data = '')
    {
        return json_encode(["status"=>$status,"msg"=>$msg,"data"=>$data]);
    }

    /**
     * 记录日志
     * @param $msg
     * @param string $path
     */
    private function log($msg,$path = '')
    {

        if ($path == '')
            $path = debug_backtrace()[1];

        $log = new \Monolog\Logger('vikin');

        $log->pushHandler(
            new \Monolog\Handler\StreamHandler(
                storage_path('logs/'.$path),
                \Monolog\Logger::INFO
            )
        );

        $log->addInfo(json_encode(['msg'=>$msg,'accountId'=>\session('userInfo')['id']]));
    }

    /**
     * 检查是否为超级管理员
     * @return bool
     */
    private function checkAuth()
    {
        if (\session('userInfo')['character'] != 'super')
            return false;
        else
            return true;
    }

    /**
     * 增加字幕组页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addSubTitleGroup()
    {
        //检查权限
        if (!$this->checkAuth())
            return view('admin.index');

        return $this->render('admin.addSubTitleGroup');
    }

    /**
     * 执行增加字幕组
     * @return string
     */
    public function doAddSubTitleGroup()
    {
        //检查权限
        if (!$this->checkAuth())
            return $this->reJson(0,'只有超级管理员才能访问字幕组模块');

        $username = Input::get('username');

        if (!$username)
            return $this->reJson(0,'填完才能加');

        $exist = \App\Http\Models\SubTitle::where('name',$username)->select('id')->get()->toArray();

        if ($exist)
            return $this->reJson(0,'字幕组已存在');

        $data =
            [
                'name'=>$username,
                'create_time'=>date('Y-m-d H:i:s'),
                'update_time'=>date('Y-m-d H:i:s'),
            ];

        $insert = \App\Http\Models\SubTitle::insert($data);

        $this->log($data,__FUNCTION__);

        return $insert ? $this->reJson(1,'添加字幕组成功') : $this->reJson(0,'服务器错误');

    }

    /**
     * 增加字幕组列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subTitleGroupList()
    {
        //检查权限
        if (!$this->checkAuth())
            return view('admin.index');

        $groups = DB::table('fansub')->paginate(15);

        return view('admin.subTitleGroupList',['items'=>$groups->toArray()['data'],'page'=>$groups->links()]);
    }

    /**
     * 修改字幕组信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateSubTitleGroup()
    {

        //检查权限
        if (!$this->checkAuth())
            return view('admin.index');

        $id = Input::get('id');

        if (!$id)
            return view('admin.index');

        $item = \App\Http\Models\SubTitle::where('id',$id)->get()->toArray();

        return view('admin.updateSubTitleGroup',['item'=>$item[0]]);
    }

    /**
     * 执行修改字幕组
     * @return string
     */
    public function doUpdateSubTitleGroup()
    {
        //检查权限
        if (!$this->checkAuth())
            return $this->reJson(0,'没有权限');

        $id = Input::get('id');
        $name = Input::get('username');

        if (!$name || !$id)
            return $this->reJson(0,'填写完才能修改');

        $exist = \App\Http\Models\SubTitle::where('name',$name)->select('id')->get()->toArray();

        if ($exist) {
            if ($exist[0]['id'] != $id ) {
                return $this->reJson(0,'这个字幕组的名字已经有了');
            }
        }

        $data =
            [
                'name'=>$name,
                'update_time'=>date('Y-m-d H:i:s')
            ];

        $update = \App\Http\Models\SubTitle::where('id',$id)->update();

        $this->log($data,__FUNCTION__);

        if ($update)
            return $this->reJson(1,'修改成功');
        else
            return $this->reJson(0,'系统错误');

    }

    /**
     * 删除字幕组
     * @return string
     */
    public function deleteSubTitleGroup()
    {
        //检查权限
        if (!$this->checkAuth())
            return $this->reJson(0,'没有权限');

        $id = Input::get('id');

        if (!$id)
            return $this->reJson(0,'参数不足');

        $check = \App\Http\Models\Admin::where('fansub_id',$id)->select('id')->get()->toArray();

        if ($check)
            return $this->reJson(0,'该字幕组存在账户， 请先删除账户');

        $delete = \App\Http\Models\SubTitle::where('id',$id)->delete();

        $this->log($id,__FUNCTION__);

        return $delete ?
            $this->reJson(1,'删除成功') :
            $this->reJson(0,'系统错误');


    }

    /**
     * 增加字幕组账户页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addSubTitleGroupAccount()
    {

        //检查权限
        if (!$this->checkAuth())
            return view('admin.index');

        $fanSubs = \App\Http\Models\SubTitle::select('name','id')->get()->toArray();

        return view('admin.addSubTitleGroupAccount',['fanSubs'=>$fanSubs]);
    }

    /**
     * 执行增加字幕组账户页面
     * @return string
     */
    public function doAddSubTitleGroupAccount()
    {
        //检查权限
        if (!$this->checkAuth())
            return $this->reJson(0,'只有超级管理员才能加账号');

        $password = Input::get('password');
        $confirm_password = Input::get('confirm_password');
        $username = Input::get('username');
        $fansub_id = Input::get('fansub_id');

        if (!$username || !$password || !$confirm_password || !$fansub_id)
            return $this->reJson(0,'填完才能加');

        if ($password != $confirm_password)
            return $this->reJson(0,'密码不一致');

        $exist = \App\Http\Models\Admin::where('user_name',$username)->select('id')->get()->toArray();

        if ($exist)
            return $this->reJson(0,'账号已存在');

        $data =
            [
                'user_name'=>$username,
                // 'password'=>password_hash($password,PASSWORD_DEFAULT,['cost'=>12]),
                'password'=>md5($this->salt.$password),
                'fansub_id'=>$fansub_id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'bbs_child_id'=>0,
                'character'=>'',
                'sensitive_auth'=>''
            ];

        $insert = \App\Http\Models\Admin::insert($data);

        $this->log($data,__FUNCTION__);

        return $insert ? $this->reJson(1,'添加字幕组账号成功') : $this->reJson(0,'服务器错误');
    }

    /**
     * 字幕组账户列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subTitleGroupAccountList()
    {
        //检查权限
        if (!$this->checkAuth())
            return view('admin.index');

        $subTitles = \App\Http\Models\SubTitle::select('id','name')->get()->toArray();

        $subArr = [];

        foreach ($subTitles as $v) {
            $subArr[$v['id']] = $v['name'];
        }

        $groups = \App\Http\Models\Admin::where('fansub_id','>',0)->where('character','<>','super')->paginate(15);

        return view('admin.subTitleGroupAccountList',['items'=>$groups->toArray()['data'],'page'=>$groups->links(),'subArr'=>$subArr]);

    }

    /**
     * 修改字幕组账户
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateSubTitleGroupAccount()
    {
        //检查权限
        if (!$this->checkAuth())
            return view('admin.index');

        $id = Input::get('id');

        if (!$id)
            return view('admin.index');

        $fanSubs = \App\Http\Models\SubTitle::select('name','id')->get()->toArray();

        $item = \App\Http\Models\Admin::where('id',$id)->get()->toArray()[0];

        return view('admin.updateSubTitleGroupAccount',['fanSubs'=>$fanSubs,'item'=>$item]);
    }

    /**
     * 执行修改字幕组账户
     * @return string
     */
    public function doUpdateSubTitleGroupAccount()
    {
        //检查权限
        if (!$this->checkAuth())
            return $this->reJson(0,'没有权限');

        $id = Input::get('id');
        $fansub_id = Input::get('fansub_id');
        $username = Input::get('username');
        $password = Input::get('password');
        $confirm_password = Input::get('confirm_password');

        if (!$id || !$fansub_id || !$username)
            return $this->reJson(0,'参数不足');


        $exist = \App\Http\Models\Admin::where('user_name',$username)->select('id')->get()->toArray();

        foreach ($exist as $v)
        {
            if ($v['id'] != $id)
                return $this->reJson(0,'账号已存在');
        }

        $updateData = ['updated_at'=>date('Y-m-d H:i:s'),'fansub_id'=>$fansub_id,'user_name'=>$username];

        if ($password != '******') {
            if ($password != $confirm_password)
                return $this->reJson(0,'两次密码不一致');

            $updateData['password'] = md5($this->salt.$password);
        }

        $update = \App\Http\Models\Admin::where('id',$id)->update($updateData);

        $this->log($updateData,__FUNCTION__);

        return $update ?
            $this->reJson(1,'修改成功'):
            $this->reJson(0,'系统错误');

    }

    /**
     * 删除字幕组账户
     * @return string
     */
    public function deleteSubTitleGroupAccount()
    {
        //检查权限
        if (!$this->checkAuth())
            return $this->reJson(0,'没有权限');

        $id = Input::get('id');

        if (!$id)
            return $this->reJson(0,'参数不足');

        //TODO 根据后续逻辑  判断能不能直接删除

        $delete = \App\Http\Models\Admin::where('id',$id)->delete();

        $this->log($id,__FUNCTION__);

        return $delete ?
            $this->reJson(1,'删除成功') :
            $this->reJson(0,'系统错误');
    }

}
