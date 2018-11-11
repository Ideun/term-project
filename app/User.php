<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //model은 디폴트로
    //1.pk가 id이다
        //=> protected $primaryKey = "칼럼이름";
        //으로 수정 가능.
    //2.pk가 autoincrement다
        //=> public $incrementing = false; autoincrement가 아니라고 변경 가능
    //3.created_at과 updated_at 칼럼이 존재한다
        //=> public $timestamps = false; 로 존재 안 한다고 변경 가능
    //고 정해져있다.
}
