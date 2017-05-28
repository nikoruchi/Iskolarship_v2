<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EssayQuestions extends Model
{
     use Notifiable;
    protected $primaryKey = 'essay_questionsID';
    protected $table = 'essay_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'scholarship_id',
    	'essay_question',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}