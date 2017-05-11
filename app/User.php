<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'user_id';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 
        'email', 
        'user_password', 
        'user_contact', 
        'user_type',
        'user_aboutme',
        'user_imagepath'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function user_student(){
        return $this->hasOne('Scholar');
    }

    public function hasRole($role){
        return $this->user_type == $role;
    }
}