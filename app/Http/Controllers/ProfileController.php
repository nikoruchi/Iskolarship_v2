<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Sponsor;
use App\Scholarship;
use App\User;
use Auth;
use App\Application; 

class ProfileController extends Controller{
    
   public function profileNotStudent($student_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $studentProfile = Scholar::findOrFail($student_id);
        $scholarships = Scholarship::join('application','Application.scholarship_id','=','Scholarship.scholarship_id')
                ->where('Application.student_id', '=', $student_id)
                ->where('Application.accept_status','=','accept')
                ->where('Application.avail_status','=','accept')
                ->select('Application.application_id','Scholarship.scholarship_id','Scholarship.scholarship_name','Scholarship.scholarship_desc')
                ->get();

        if((Auth::user()->user_type)=='sponsor'){
            $sponsor = Sponsor::findOrFail($user_id);
            return view('profiles.profile_scholar',compact('studentProfile','scholarships','user','sponsor'));
        }

        if((Auth::user()->user_type)=='student'){
            $student = Scholar::findOrFail($user->user_student->student_id);            
            return view('profiles.profile_scholar',compact('studentProfile','scholarships','student','user'));    
        }
    }
    
}