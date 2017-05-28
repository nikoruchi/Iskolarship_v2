<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationSiblingScholar extends Model
{
     use Notifiable;
    protected $primaryKey = 'sibling_id';
    protected $table = 'application_siblingscholars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'student_id',
    	'sibling_name',
        'sibling_scholarship' ,
        'sibling_courseschool',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
      public function applicationsiblings(){
        return $this->belongsTo('App\Scholar','student_id');
    }

}