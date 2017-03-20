<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
	protected $table = 'admin';
	private $salt=null;
	private $valid;

    public function __construct()
    {
        $this->salt='josefa';
        $this->valid=['super'];
	}

    public function checkLogin($request)
    {
    	if(session('userInfo')&&in_array(session('userInfo')['character'],$this->valid)){
			$result=true;
		}else{
			$user_name=$request->user_name;
			$password=$request->password;
			$str=md5($password.$this->salt);
			if($userInfo=Admin::where(['user_name'=>$user_name,'password'=>$str])->first()){
				session(['userInfo'=>$userInfo->toArray()]);
				$result=true;
			}else{
				$result=false;
			}
		}

        return $result;
    }

}
