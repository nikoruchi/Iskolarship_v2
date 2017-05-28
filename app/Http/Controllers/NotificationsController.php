<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Sponsor;
use App\User;
use Auth;
use App\Application;
use App\Notification;
use DB;

class NotificationsController extends Controller{

    public function viewNotifications(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::find($student_id);

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        
        
        var_dump(count($notification));
        return view('profiles.notifications', compact('user', 'student', 'notification', 'student_id')); 
    }   

    public function viewNotificationsFrSponsor(){
        // $user_id = Auth::user()->user_id;
        // $user = User::findOrFail($user_id);
        // $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');
        // $sponsor = Sponsor::findOrFail($sponsor_id);

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');
        $sponsor = Sponsor::findOrFail($spon_id);

         $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();

        var_dump($user_id);
        return view('profiles.notifications', compact('user', 'sponsor', 'notification', 'sponsor_id')); 
    }   
}


