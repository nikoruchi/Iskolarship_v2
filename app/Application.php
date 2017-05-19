<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use Notifiable;
    protected $primaryKey = 'application_id';
    protected $table = 'application';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'scholarship_id',
    	'student_id',
        'application_date' ,
        'accept_status',
        'avail_status',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function deadline(){
        return $this->hasMany('App\ScholarshipsDeadline');
    }
    public function scholarship(){
        return $this->belongsTo('App\Scholarship','scholarship_id');
    }
    public function scholar(){
        return $this->belongsTo('App\Scholar', 'student_id');
    }
}