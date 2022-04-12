<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    *新注册用户设置默认profile信息，如title,image
    *
    *还有一种，在Models Profile内的profileImage函数里，做判断，
    *
    */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title'=> $user->name,
            ]);
        });
    }

    public function profile(){
        return $this->hasOne(Profile::class,"user_id","id");
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    public function post(){
        return $this->hasMany(Post::class,"user_id","id")->orderBy('created_at','DESC');
    }
}
