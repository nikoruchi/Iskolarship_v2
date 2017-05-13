<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationParentsInfo extends Model
{
     use Notifiable;
    protected $primaryKey = 'parent_id';
    protected $table = 'application_parentsinfo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'application_id',
    	'father_type',
        'father_name' ,
        'father_occupation',
        'father_education',
        'father_tribe',
        'mother_type',
        'mother_name',
        'mother_occupation',
        'mother_education',
        'mother_tribe',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}