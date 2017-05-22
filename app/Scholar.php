<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Foundation\Auth\Scholar as Authenticatable;

class Scholar extends Model
{
    use Notifiable;
    protected $primaryKey = 'student_id';
    protected $table = 'student_account';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    	'student_fname',
        'student_lname' ,
        'student_gender',
        'student_birthdate',
        'student_address' ,
        'student_region' ,
        'student_nationality',
        'student_beginstudies',
        'student_highestdegree' ,
        'student_studyfield',
        'student_degreesought' ,
        'student_university',
        'student_universityaddress'
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    public function student()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function application(){
        return $this->hasMany('App\Application', 'student_id');
    }
}
