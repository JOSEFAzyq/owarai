<?php

namespace App\Http\Middleware;

use App\Http\Models\Admin;
use App\Http\Models\Article;
use Closure;

class checkAdmin
{
	private $salt=null;
	private $user_name=null;
	private $password=null;
	private $valid;

	public function __construct()
	{
		$this->salt='josefa';
		//允许访问后台的角色
		$this->valid=['super','subfan'];

	}

    /**
     * 验证后台账号.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    	if(!$this->checkAdmin($request)){
    		return redirect('admin/login');exit;
		}
        return $next($request);
    }

	protected function checkAdmin($request)
	{
		if (session('userInfo')&&in_array(session('userInfo')['character'],$this->valid)){
			return true;
		}else{
			return false;
		}
    }


}
