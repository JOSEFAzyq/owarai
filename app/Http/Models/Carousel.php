<?php

namespace App\http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\Http\Models\UploadCropImage;

class Carousel extends Model
{
    protected $table = 'carousel';
    protected $guarded=[];

    public function scopeInUse($query)
    {
        return $query->where('status', 1);
    }


}
