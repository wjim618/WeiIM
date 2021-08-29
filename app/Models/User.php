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
     * @var array
     */
    protected $fillable = [
        'name', 'wechat_name', 'wechat_open_id', 'wechat_session_key', 'wechat_avatar',
        'gender', 'signature', 'status'
    ];

    /**
     * 关联关系绑定：一个用户可以存在多个好友
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friends(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Friend::class);
    }
}
