<?php

namespace App\Http\Middleware;

use App\Http\Models\Admin;
use Closure;

class checkAdmin
{
	private $salt=null;

	public function __construct()
	{
		$this->salt='josefa';
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
    	if(!false&&$this->checkAdmin()){
    		//return redirect('admin/login');
		}
        return $next($request);
    }

	protected function checkAdmin()
	{

		$rs=Admin::where('id',1)->get();
		var_dump($rs);
		return true;
    }


}
