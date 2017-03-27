<?php

namespace App\http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\Http\Models\UploadCropImage;

class Carousel extends Model
{
    protected $table = 'carousel';
    protected $guarded=[];

    public function  getList($data)
    {

        $start = isset($data['start'])?$data['start']:0;
        $length = isset($data['length'])?$data['length']:9;

        $r = Carousel::where('status', '<', 100)->paginate($length);
        return $r;
    }

    public function add()
    {

        $newDir = public_path().'/upload/carousel';

        if (!file_exists($newDir))
        {
            mkdir($newDir);
            chmod($newDir,"0777");
        }

        $upload = new UploadCropImage(['w'=>100,'h'=>100], $_POST['avatar_data'], $_FILES['avatar_file'],$newDir);

        $uploadMsg      = $upload -> getMsg();

        if ($uploadMsg != '')
            return $this->reJson(0,$uploadMsg);

        $uploadFileName = $upload -> getResult();


        $data =
            [

                'name'=>Input::get('c_title'),
                'url'=>$uploadFileName,
                'order'=>0,
                'status'=>Input::get('c_status'),
                'type'=>Input::get('c_type'),
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


    private function reJson($status = 0,$msg = '',$data = '')
    {
        return json_encode(["status"=>$status,"msg"=>$msg,"data"=>$data]);
    }
}
