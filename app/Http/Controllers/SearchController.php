<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Scholar;
use App\Scholarship;
use App\Sponsor;
use App\User;
use App\Message;
use App\Notification;

class SearchController extends Controller
{
    
    public function searchStudent() {

        $scholarships = null;
        $sponsors =  null;
        $scholars = null;
        $opens = null;

        $keyword = empty(Input::get('keyword'))? '' : Input::get('keyword') ;
        $filter = Input::get('search_q');
        $size = count('search_q');

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);

        if(!(empty($keyword))){

            if(empty($filter)) {

                $scholarships = Scholarship::where('scholarship_name','LIKE','%'.$keyword.'%')                
                    ->orderBy('scholarship_name')
                    ->get();

                $scholars = Scholar::where('student_fname','LIKE','%'.$keyword.'%')
                    ->orWhere('student_lname','LIKE','%'.$keyword.'%')
                    ->orderBy('student_fname')
                    ->get();

                $sponsors = Sponsor::where('sponsor_fname','LIKE','%'.$keyword.'%')
                    ->orWhere('sponsor_lname','LIKE','%'.$keyword.'%')
                    ->orderBy('sponsor_fname')
                    ->get();

                $opens = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.scholarship_name','LIKE','%'.$keyword.'%')
                    ->where('Scholarship_deadline.scholarship_deadlineenddate','>',date('Y-m-d').' 00:00:00')
                    ->orderBy('Scholarship.scholarship_name')
                    ->get();

            } else {

                foreach($filter as $filt){

                    if($filt == "scholarships"){
                        $scholarships = Scholarship::where('scholarship_name','LIKE','%'.$keyword.'%')
                            ->orderBy('scholarship_name')
                            ->get();
                    }

                    if($filt == "scholars"){
                        $scholars = Scholar::where('student_fname','LIKE','%'.$keyword.'%')
                            ->orWhere('student_lname','LIKE','%'.$keyword.'%')
                            ->orderBy('student_fname')
                            ->get();
                    }

                    if($filt == "sponsors"){
                        $sponsors = Sponsor::where('sponsor_fname','LIKE','%'.$keyword.'%')
                            ->orWhere('sponsor_lname','LIKE','%'.$keyword.'%')
                            ->orderBy('sponsor_fname')
                            ->get();
                    }

                    if($filt == "open_applications"){
                        $opens = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                            ->where('Scholarship.scholarship_name','LIKE','%'.$keyword.'%')
                            ->where('Scholarship_deadline.scholarship_deadlineenddate','>',date('Y-m-d').' 00:00:00')
                            ->orderBy('Scholarship.scholarship_name')
                            ->get();
                    }
                }
            }

        } else {

            $scholarships = Scholarship::orderBy('scholarship_name')->get();

            $scholars = Scholar::orderBy('student_fname')->get();

            $sponsors = Sponsor::orderBy('sponsor_fname')->get();

            $opens = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                ->where('Scholarship_deadline.scholarship_deadlineenddate','>',date('Y-m-d').' 00:00:00')
                ->orderBy('Scholarship.scholarship_name')
                ->get();

        }

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('search_results',compact('student','scholarships','scholars','sponsors','opens','keyword','user', 'unread', 'unnotif'));
    }


    public function searchSponsor() {

        $scholarships = null;
        $sponsors =  null;
        $scholars = null;
        $opens = null;

        $keyword = empty(Input::get('keyword'))? '' : Input::get('keyword') ;
        $filter = Input::get('search_q');
        $size = count('search_q');

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);

        if(!(empty($keyword))){

            if(empty($filter)) {

                $scholarships = Scholarship::where('scholarship_name','LIKE','%'.$keyword.'%')                
                    ->orderBy('scholarship_name')
                    ->get();

                $scholars = Scholar::where('student_fname','LIKE','%'.$keyword.'%')
                    ->orWhere('student_lname','LIKE','%'.$keyword.'%')
                    ->orderBy('student_fname')
                    ->get();

                $sponsors = Sponsor::where('sponsor_fname','LIKE','%'.$keyword.'%')
                    ->orWhere('sponsor_lname','LIKE','%'.$keyword.'%')
                    ->orderBy('sponsor_fname')
                    ->get();

                $opens = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                    ->where('Scholarship.scholarship_name','LIKE','%'.$keyword.'%')
                    ->where('Scholarship_deadline.scholarship_deadlineenddate','>',date('Y-m-d').' 00:00:00')
                    ->orderBy('Scholarship.scholarship_name')
                    ->get();

            } else {

                foreach($filter as $filt){

                    if($filt == "scholarships"){
                        $scholarships = Scholarship::where('scholarship_name','LIKE','%'.$keyword.'%')
                            ->orderBy('scholarship_name')
                            ->get();
                    }

                    if($filt == "scholars"){
                        $scholars = Scholar::where('student_fname','LIKE','%'.$keyword.'%')
                            ->orWhere('student_lname','LIKE','%'.$keyword.'%')
                            ->orderBy('student_fname')
                            ->get();
                    }

                    if($filt == "sponsors"){
                        $sponsors = Sponsor::where('sponsor_fname','LIKE','%'.$keyword.'%')
                            ->orWhere('sponsor_lname','LIKE','%'.$keyword.'%')
                            ->orderBy('sponsor_fname')
                            ->get();
                    }

                    if($filt == "open_applications"){
                        $opens = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                            ->where('Scholarship.scholarship_name','LIKE','%'.$keyword.'%')
                            ->where('Scholarship_deadline.scholarship_deadlineenddate','>',date('Y-m-d').' 00:00:00')
                            ->orderBy('Scholarship.scholarship_name')
                            ->get();
                    }
                }
            }

        } else {

            $scholarships = Scholarship::orderBy('scholarship_name')->get();

            $scholars = Scholar::orderBy('student_fname')->get();

            $sponsors = Sponsor::orderBy('sponsor_fname')->get();

            $opens = Scholarship::join('scholarship_deadline','Scholarship.scholarship_id','=','Scholarship_deadline.scholarship_id')
                ->where('Scholarship_deadline.scholarship_deadlineenddate','>',date('Y-m-d').' 00:00:00')
                ->orderBy('Scholarship.scholarship_name')
                ->get();

        }

        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();

        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();

        return view('search_results',compact('sponsor','scholarships','scholars','sponsors','opens','keyword','user', 'unread', 'unnotif'));
        //  return view('search_results',compact('scholarships','scholars','sponsors','keyword','user','student'));
    }
}
