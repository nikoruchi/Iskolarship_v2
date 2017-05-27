<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplicationFamilyAppliances extends Model
{
    use Notifiable;
    protected $primaryKey = 'entry_id';
    protected $table = 'application_familyappliances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 		'student_id',
    	'aircon_num',
        'aircon_acquisitiion' ,
        // 'aircon_year',
        'camera_num',
        'camera_acquisition',
        // 'camera_year',
        'vehicle_num',
        'vehicle_acquisition',
        // 'vehicle_year',
        'jeep_num',
        'jeep_acquisition',
        // 'jeep_year',
        'ipad_num',
        'ipad_acquisition',
        // 'ipad_year',
        'laptop_num',
        'laptop_acquisition',
        // 'laptop_year',
        'freezer_num',
        'freezer_acquisition',
        // 'freezer_year',
        'dryer_num',
        'dryer_acquisition',
        // 'dryer_year',
        'pump_num',
        'pump_acquisition',
        // 'pump_year',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}