<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationFamilyFinancial extends Model
{
     use Notifiable;
    protected $primaryKey = 'financial_id';
    protected $table = 'application_familyfinancial';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'student_id',
    	'father_employername',
        'father_employeraddress' ,
        'father_AGincome',
        'father_selfAGincome',
        'mother_employername',
        'mother_employeraddress',
        'mother_AGincome',
        'mother_selfAGincome',
        'beneficiary_dswd4ps',
        'housing_ownershiptype',
        'housing_rental',
        'housing_amortization',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function applicationfinance(){
        return $this->belongsTo('App\Scholar','student_id');
    }
}