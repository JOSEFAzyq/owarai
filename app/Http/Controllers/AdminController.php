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

	private $salt=null;
	protected $admin;

	public function __construct()
	{
		$this->salt='josefa';
		$this->admin=new Admin();
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
		return view('admin.index');
	}

	//文章列表
	public function articleList()
	{
		return view('admin.articleList');
	}

	/*
	 * 文章发布
	 * */
	public function articlePublish()
	{
		return view('admin.articlePublish');
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
        $rs=Article::all();
        var_dump($rs);
	}




    /**
     * 添加轮播图展示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function carouselAdd()
    {
        return view('admin.carouselAdd');
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
        return view('admin.carouselList');
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

        return view('admin.carouselConfig',['carousel'=>$carousel]);
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

}
