<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'user_id';
    protected $table = 'users';

    
     
    protected $fillable = [
        'email', 
        'password', 
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
        return $this->hasOne('App\Scholar', 'user_id');
    }

    public function user_sponsor(){
        return $this->hasOne('App\Sponsor', 'user_id');        
    }

    public function hasRole($role){
        return $this->user_type == $role;
    }

    public function messages(){
        return $this->hasMany('App\Messages');
   }
}