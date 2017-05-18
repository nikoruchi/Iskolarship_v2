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
    public function application(){
        return $this->hasMany('App\ScholarshipsDeadline');
    }
    public function appscholarship(){
        return $this->belongsTo('App\Scholarship','scholarship_id');
    }
}