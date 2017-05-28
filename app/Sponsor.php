<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model{

	use Notifiable;
    protected $primaryKey = 'sponsor_id';
    protected $table = 'sponsor_account';

    protected $fillable = [
        'user_id',
    	'sponsor_fname',
        'sponsor_lname' ,
        'sponsor_address' ,
        'sponsor_job' ,
        'sponsor_agency',
        'sponsor_agencyaddress'       
    ];

     public function usersponsor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function sponsorsentmessages(){
        return $this->hasMany('App\Message', 'msg_sender', 'user_id');
    }

    public function owns(){
        return $this->hasMany('App\Scholarship','sponsor_id');
    }
    // public function fullname(){
    //     return $this->attributes['sponsor_fname'] . ' ' . $this->attributes['sponsor_lname'];
    // }
}
