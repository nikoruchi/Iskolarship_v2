<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Scholarship;
use App\User;
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

        return view('home', compact('student', 'user', 'scholarships'));
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

		$scholarships = Application::where('student_id', '=', $student_id)
    		->where('accept_status','=','accept')
    		->where('avail_status','=','accept')
    		->get();

  	    $pendingAvail = Application::where('student_id','=',$student_id)
            ->where('accept_status','=','accept')
            ->where('avail_status','=','pending')
            ->get();
            return view('profiles.profile_scholar', compact('studentProfile','student', 'user','scholarships','pendingAvail')); 
    }  
}