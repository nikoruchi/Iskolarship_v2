<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Scholarship extends Model
{
     use Notifiable;
    protected $primaryKey = 'scholarship_id';
    protected $table = 'scholarship';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'sponsor_id',
    	'scholarship_name',
        'scholarship_desc' ,
        'scholarship_logo',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function scholarshipApp(){
        return $this->hasMany('App\Application','scholarship_id');
    }
    public function scholarshipsdeadline(){
        return $this->hasMany('App\ScholarshipsDeadline');
    }

}