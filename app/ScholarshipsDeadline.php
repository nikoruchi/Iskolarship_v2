<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ScholarshipsDeadline extends Model
{
    use Notifiable;
    protected $primaryKey = 'scholarship_deadlineID';
    protected $table = 'scholarship_deadline';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'scholarship_id',
    	'scholarship_deadlinestartdate',
        'scholarship_deadlineenddata' ,      
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}