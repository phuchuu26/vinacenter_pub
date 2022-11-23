<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // role : 
    // 1 -> admin
    // 0 -> user Đồng
    // 2 -> user Bạc
    // 3 -> user Vàng

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'vnc_users';
    protected $fillable = [
       'id', 'name','username', 'password','created_at','updated_at', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function infoUser()
    {
        return $this->hasOne(InfoUser::class, 'id_user', 'id');
    }

}
