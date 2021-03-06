<?php

namespace App\Http\Controllers;
use Auth; 
use App\User;
use App\Sponsor;
use App\Scholar;
use App\Application;
use App\Scholarship;
use App\Message;
use App\Notification;
use Illuminate\Http\Request; 
use Carbon\Carbon;
use App\ScholarshipsDeadline;
use App\ScholarshipGrant;
use App\ScholarshipSpecification;
use App\EssayQuestions;
use Illuminate\Routing\Redirector;

use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class ScholarshipsController extends Controller
{
    public function createForm()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id);
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        return view('registration.scholarship_form', compact('user', 'sponsor', 'sponsor_id', 'user_id', 'unread', 'unnotif')); 
    }

    public function createScholarship(Request $request){
        $currentTime = Carbon::now()->toDateTimeString();
        $details = $request->details;
        $grants = $request->grants;
        $specs = $request->specifications;
        $questions = $request->questions;
       
        $user_id = Auth::user()->user_id;
        $sponsor_id = Sponsor::where('user_id','=',$user_id)->pluck('sponsor_id')->first();

        $scholarship = new Scholarship;
        $scholarship->sponsor_id = $sponsor_id;
        $scholarship->scholarship_name = $details[0];
        $scholarship->scholarship_desc = $details[1];
        $scholarship->scholarship_coverage = $details[3];
        $scholarship->scholarship_logo = 'default.jpg';
        $scholarship->save();
    
        $lastId = $scholarship->scholarship_id;
    
        $deadline = new ScholarshipsDeadline;
        $deadline->scholarship_id=$lastId;
        $deadline->scholarship_deadlinestartdate=$currentTime;
        $deadline->scholarship_deadlineenddate=$details[2];
        $deadline->save();

        for($i=0;$i<(count($grants));$i++){
            $grant = new ScholarshipGrant;
            $grant->scholarship_id = $lastId;
            $grant->scholarship_grantDesc=$grants[$i];
            $grant->save();
        }

        for($i=0;$i<(count($specs));$i++){
            $spec = new ScholarshipSpecification;
            $spec->scholarship_id = $lastId;
            $spec->scholarship_specDesc=$specs[$i];
            $spec->save();
        }

        for($i=0;$i<(count($questions));$i++){
            $question = new EssayQuestions;
            $question->scholarship_id = $lastId;
            $question->essay_question=$questions[$i];
            $question->save();
        }
        
        return $lastId;
    }
 
    public function scholarshipStudent($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();

        $student = Scholar::findOrFail($stud_id);

        $scholarship = Scholarship::find($scholarship_id);
        $spon_id = Scholarship::find($scholarship_id)->sponsor_id;
        $sponsor = Sponsor::findOrFail($spon_id);

        $specifications = Scholarship::find($scholarship_id)->specifications;
        $grants = Scholarship::find($scholarship_id)->grants;
        $scholars = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->get();
        $exists = Application::where('scholarship_id','=',$scholarship_id)
                    // ->where('accept_status','=','pending')
                    // ->where('avail_status','=','pending')
                    ->where('student_id','=',$stud_id)
                    ->count();

        $currentTime = Carbon::now()->toDateTimeString();

        $deadline = ScholarshipsDeadline::find($scholarship_id)
                    ->pluck('scholarship_deadlineenddate');
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
            ->where('Notification.account_id','=',$user_id)
            ->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
            ->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        // $deadline = ScholarshipsDeadline::where('scholarship_id','=',$scholarship_id)
        //     ->first()->scholarship_deadlineenddate;     
        
        return view('/profiles/profile_scholarship', compact('student', 'sponsor', 'user','scholarship','specifications','grants','scholars','exists','currentTime','deadline', 'unread', 'unnotif'));
    }

     public function scholarshipSponsor($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);

        $scholarship = Scholarship::find($scholarship_id);
        $specifications = Scholarship::find($scholarship_id)->specifications;
        $grants = Scholarship::find($scholarship_id)->grants;
        $scholars = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->get();

        $currentTime = Carbon::now()->toDateTimeString();
        $deadline = ScholarshipsDeadline::where('scholarship_id','=',$scholarship_id)
            ->pluck('scholarship_deadlineenddate');
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('/profiles/profile_scholarship', compact('sponsor','user','scholarship', 'deadline', 'currentTime', 'specifications','grants','scholars', 'unread', 'unnotif'));
    } 

    public function reopenScholarship($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);

        $newdate = Input::get('new_deadline');
        $scholarship_id = Input::get('scholarship_id');

        $new_deadline = new ScholarshipsDeadline;
        $new_deadline->scholarship_id = $scholarship_id;
        $new_deadline->scholarship_deadlinestartdate = Carbon::now();
        $new_deadline->scholarship_deadlineenddate = $newdate;
        $new_deadline->save();

       // return redirect()->route('/profile sponsor', );
        return redirect()->action('SponsorController@viewProfile');
    }

}