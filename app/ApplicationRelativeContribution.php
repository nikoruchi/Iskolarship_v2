<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationRelativeContribution extends Model
{
     use Notifiable;
    protected $primaryKey = 'relative_id';
    protected $table = 'application_relativecontribution';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'student_id',
        'relative_name',
    	'relative_natureofcontribution',
        'relative_relationship' ,
        'relative_averagecontribution',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}