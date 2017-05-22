<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reply extends Model
{
    use Notifiable;
    protected $primaryKey = 'reply_id';
    protected $table = 'messages_replies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id',
        'msg_id',
        'reply_content', 
    ];

   public function parentmessage(){
        return $this->belongsTo('App\Message', 'msg_id');
   }
}