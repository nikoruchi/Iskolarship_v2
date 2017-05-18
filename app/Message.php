<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Notifiable;
    protected $primaryKey = 'msg_id';
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'msg_receiver',
    	'msg_sender',
        'msg_subject' ,
        'msg_content',
        'msg_date',
        'msg_status',       
    ];

   public function yourmessages(){
        return $this->belongToMany('App\User', 'msg_sender');
   }


}