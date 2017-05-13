<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
     use Notifiable;
    protected $primaryKey = 'notification_id';
    protected $table = 'notification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'notification_desc',
    	'notification_date',
        'notification_status' ,
        'application_id', 
        'account_id',      
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}