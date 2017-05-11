<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ScholarshipGrant extends Model
{
     use Notifiable;
    protected $primaryKey = 'scholarship_grantID';
    protected $table = 'scholarship_grant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'scholarship_id',
    	'scholarship_grantDesc',    
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}