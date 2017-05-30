<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholarship;
use App\Scholar;
use App\User;
use App\Message;
use App\Notification;
use Auth;
use App\Application;
use DB;
use Illuminate\Support\Facades\Log;

class ScholarController extends Controller{

    public function viewHome(){
        $scholarships = Scholarship::orderByRaw("RAND()")
            ->take(5)
            ->get();

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        return view('home', compact('student', 'user', 'scholarships', 'unread', 'unnotif'));
    }
    
    public function viewProfile(){
    	$user_id = Auth::user()->user_id;
    	$user = User::findOrFail($user_id);
    	$student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
    	$student = Scholar::find($student_id);
        $studentProfile = Scholar::find($student_id);

		// $pending = Application::where('student_id','=', $student_id)
        // ->where('accept_status', '=','pending')
        // ->where('avail_status','=','pending')
        // ->get();

		$scholarships = Scholarship::join('application','Application.scholarship_id','=','Scholarship.scholarship_id')
            ->where('Application.student_id', '=', $student_id)
    		->where('Application.accept_status','=','accept')
    		->where('Application.avail_status','=','accept')
            ->select('Application.application_id','Scholarship.scholarship_id','Scholarship.scholarship_name','Scholarship.scholarship_desc')
    		->get();

  	    $pendingAvail = Application::where('student_id','=',$student_id)
            ->where('accept_status','=','accept')
            ->where('avail_status','=','pending')
            ->get();

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('profiles.profile_scholar', compact('studentProfile','student', 'user','scholarships','pendingAvail', 'unread', 'unnotif')); 
    }  
}