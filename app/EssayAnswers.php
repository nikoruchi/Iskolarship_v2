<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EssayAnswers extends Model
{
     use Notifiable;
    protected $primaryKey = 'essay_answersID';
    protected $table = 'essay_answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'essay_questionID',
    	'application_id',
        'essay_answer' ,       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}