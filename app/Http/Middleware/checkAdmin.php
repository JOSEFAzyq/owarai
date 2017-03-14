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

	public function __construct()
	{
		$this->salt='josefa';
		if(getenv('APP_ENV')=='dev'){
			/*session(['user_name'=>'OwaraiClub']);
			session(['password'=>'soragaaoina.']);*/
		}
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
		/*$user_name=$request->input('user_name');
		$password=$request->input('password');*/

		$this->user_name=session('user_name');
		$this->password=session('password');
		$rs=Admin::where(['user_name'=>$this->user_name,'password'=>$this->password])->first();
		return $rs;
    }


}
