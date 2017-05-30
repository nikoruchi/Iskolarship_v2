<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationFamilyAppliances extends Model
{
    use Notifiable;
    // protected $primaryKey = 'entry_id';
    protected $table = 'application_familyappliances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'student_id',
    	'aircon_num',
        'aircon_acquisition' ,
        'camera_num',
        'camera_acquisition',
        'vehicle_num',
        'vehicle_acquisition',
        'jeep_num',
        'jeep_acquisition',
        'ipad_num',
        'ipad_acquisition',
        'laptop_num',
        'laptop_acquisition',
        'freezer_num',
        'freezer_acquisition',
        'dryer_num',
        'dryer_acquisition',
        'pump_num',
        'pump_acquisition',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function applicationstudent(){
        return $this->belongsTo('App\Scholar','student_id');
    }
}