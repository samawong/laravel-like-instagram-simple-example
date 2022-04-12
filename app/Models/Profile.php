<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
    ];

    /*
    *新注册用户没有头像，所以设置默认头像
    *没有设置头像时，用8bMc的图片做头像，数据库内该字段为空
    *还有一种，在Models User内的boot里，直接将profile的image字段写入图片地址，
    *这时数据库内该字段为图片地址信息
    */
    public function profileImage()
    {
        $imagepath = $this->image ? $this->image:'profile/8bMc6vvRxsVdiJbN4FtOrHgQKtqhQQXQ2G8OHHOv.png';
        return '/storage/'.$imagepath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
