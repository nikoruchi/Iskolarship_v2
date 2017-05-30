<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use App\Scholar;
use App\User;
use App\Scholarship;
use Auth;
use App\Application;
use DB;
use App\Message;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\ScholarshipsDeadline;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class SponsorController extends Controller{

     public function viewHome(){
        $scholarships = Scholarship::orderByRaw("RAND()")
            ->take(5)
            ->get();

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);
        $user_id = Auth::user()->user_id;
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        return view('home', compact('sponsor', 'user', 'scholarships', 'unread', 'unnotif'));
    }
   
    public function viewProfile(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);

        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id); 

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id');
        $user1 = User::findOrFail($user_id1)->first();

        $currentTime = Carbon::now()->toDateTimeString();

        $openscholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.sponsor_id','=', $sponsor_id)
                    ->where('Scholarship_deadline.scholarship_deadlineenddate','>',$currentTime)
                    ->orderBy('Scholarship.scholarship_name','asc')
                    ->distinct('Scholarship_deadline.scholarship_id')
                    ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
                    ->get();
        $endscholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.sponsor_id','=', $sponsor_id)
                    ->where('Scholarship_deadline.scholarship_deadlineenddate','<',$currentTime)
                    ->orderBy('Scholarship.scholarship_name','desc')
                    ->distinct('Scholarship_deadline.scholarship_id')
                    ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
                    ->get();

        // $scholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
        //             ->where('Scholarship.sponsor_id','=', $sponsor_id)
        //             ->orderBy('Scholarship.scholarship_name','desc')
        //             ->distinct('Scholarship_deadline.scholarship_id')
        //             ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
        //             ->get();

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id')->first();
        $user1 = User::findOrFail($user_id1);

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('profiles.profile_sponsor', compact('sponsor', 'user', 'openscholarships', 'endscholarships', 'currentTime', 'user1', 'unread', 'unnotif'));       
    } 

    public function viewSearchfromStudent($sponsor_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);

        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);

        $sponsor_id1 = Sponsor::where('sponsor_id','=', $sponsor_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id1);

        $currentTime = Carbon::now()->toDateTimeString();

        //$scholarships = Scholarship::where('sponsor_id', "=", $sponsor_id1)->orderBy('scholarship_name')->get();
        $openscholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.sponsor_id','=', $sponsor_id1)
                    ->where('Scholarship_deadline.scholarship_deadlineenddate','>',$currentTime)
                    ->orderBy('Scholarship.scholarship_name','asc')
                    ->distinct('Scholarship_deadline.scholarship_id')
                    ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
                    ->get();
        $endscholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.sponsor_id','=', $sponsor_id1)
                    ->where('Scholarship_deadline.scholarship_deadlineenddate','<',$currentTime)
                    ->orderBy('Scholarship.scholarship_name','desc')
                    ->distinct('Scholarship_deadline.scholarship_id')
                    ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
                    ->get();

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id')->first();
        $user1 = User::findOrFail($user_id1);

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('profiles.profile_sponsor', compact('sponsor', 'student', 'user', 'openscholarships', 'endscholarships', 'currentTime', 'user1', 'unread', 'unnotif'));       
    } 

    public function viewSearchfromSponsor($sponsor_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);

        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');
        $sponsor = Sponsor::findOrFail($spon_id);

        $sponsor_id2 = Sponsor::where('sponsor_id','=', $sponsor_id)->pluck('sponsor_id');
        $sponsor1 = Sponsor::find($sponsor_id2);

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id')->first();
        $user1 = User::findOrFail($user_id1);

        $currentTime = Carbon::now()->toDateTimeString();
        //$scholarships = Scholarship::where('sponsor_id', "=", $sponsor_id2)->orderBy('scholarship_name')->get();

        $openscholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
            ->where('Scholarship.sponsor_id','=', $sponsor_id2)
            ->where('Scholarship_deadline.scholarship_deadlineenddate','>',$currentTime)
            ->orderBy('Scholarship.scholarship_name','asc')
            ->distinct('Scholarship_deadline.scholarship_id')
            ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
            ->get();
        $endscholarships = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
            ->where('Scholarship.sponsor_id','=', $sponsor_id2)
            ->where('Scholarship_deadline.scholarship_deadlineenddate','<',$currentTime)
            ->orderBy('Scholarship.scholarship_name','desc')
            ->distinct('Scholarship_deadline.scholarship_id')
            ->select('Scholarship_deadline.scholarship_id','Scholarship.scholarship_name','Scholarship_deadline.scholarship_deadlineenddate','Scholarship_deadline.scholarship_deadlinestartdate')
            ->get();

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('profiles.profile_sponsor', compact('sponsor', 'sponsor1', 'currentTime', 'user', 'user1', 'openscholarships', 'endscholarships', 'unread', 'unnotif'));       
    } 

    public function scholars(){ 
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = $user->user_sponsor->sponsor_id;
        $sponsor = Sponsor::find($sponsor_id);
        
        $scholarships = Scholarship::where('sponsor_id','=',$sponsor_id)->pluck('scholarship_id');

        $officialScholars = Application::whereIn('scholarship_id',$scholarships)
            ->where('accept_status','=','accept')
            ->where('avail_status','=','accept')
            ->get();
        $pendingApplications = Application::whereIn('scholarship_id',$scholarships)
            ->where('accept_status','=','pending')
            ->where('avail_status','=','pending')
            ->get();

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('profiles.scholars', compact('user','officialScholars','pendingApplications','sponsor', 'unread', 'unnotif'));
    }

    public function profileCont($scholarship_id){
        var_dump($scholarship_id);
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = $user->user_sponsor->sponsor_id;
        $sponsor = Sponsor::find($sponsor_id);
        
        $inbox = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.sponsor_id','=', $sponsor_id)
                    ->where('Scholarship_deadline.scholarship_id','=',$scholarship_id)
                    ->get();

        $scholarships = $this->scholarships($inbox);
        return $scholarships;
    }

}