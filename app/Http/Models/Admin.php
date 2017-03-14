<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
	protected $table = 'admin';
	private $salt=null;

    public function __construct()
    {
        $this->salt='josefa';
	}

    public function checkLogin($request)
    {
        $user_name=$request->user_name;
        $password=$request->password;
        $str=md5($password.$this->salt);
        if($userInfo=Admin::where(['user_name'=>$user_name,'password'=>$str])->first()){
            session(['user_name'=>$user_name]);
            session(['password'=>$str]);
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }

}
