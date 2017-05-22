<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ScholarshipSpecification extends Model
{
     use Notifiable;
    protected $primaryKey = 'scholarship_specID';
    protected $table = 'scholarship_specification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'scholarship_id',
    	'scholarship_specDesc',    
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function scholarship(){
        return $this->belongsTo('App\Scholarship','scholarship_id');
    }

}