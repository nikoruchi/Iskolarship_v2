<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\User;
use Auth;
use App\Application;
use App\Scholarship;
use DB;
use App\Sponsor;
class ProfileController extends Controller
{
    public function profileStudent(){
    	$user_id = Auth::user()->user_id;
    	$user = User::findOrFail($user_id);
    	$student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
    	$studentProfile = Scholar::find($student_id);
        $student = Scholar::find($student_id);

		$pending = Application::where('student_id','=', $student_id)
    		->where('accept_status', '=','pending')
    		->where('avail_status','=','pending')
    		// ->deadline()->where('scholarship_deadlineenddate',)
    		->count();
		$scholarships = Application::where('student_id', '=', $student_id)
    		->where('accept_status','=','accept')
    		->where('avail_status','=','accept')
    		->get();
    	$pendingAvail = Application::where('student_id','=',$student_id)
            ->where('accept_status','=','accept')
            ->where('avail_status','=','pending')
            ->get();
  	         return view('profiles.profile_scholar', compact('studentProfile','student', 'user','pending','scholarships','pendingAvail'));   
    }   

   public function profileNotStudent($student_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $studentProfile = Scholar::find($student_id);
        if((Auth::user()->user_type)=='sponsor'){
            $sponsor = Sponsor::find($user_id);
            return view('profiles.profile_scholar',compact('studentProfile','user','sponsor'));
        }
        if((Auth::user()->user_type)=='student'){
            $student = Scholar::find($user->user_student->student_id);
            return view('profiles.profile_scholar',compact('studentProfile','student','user'));    
        }
    }
     public function scholarshipStudent($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);
        $scholarship = Scholarship::find($scholarship_id);
        return view('/profiles/profile_scholarship', compact('student','user','scholarship'));
    }

     public function scholarshipSponsor($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);
        $scholarship = Scholarship::findOrFail($scholarship_id);
        return view('/profiles/profile_scholarship', compact('sponsor','user','scholarship'));
    }
}