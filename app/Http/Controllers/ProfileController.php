<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\User;
use Auth;
use App\Application;
class ProfileController extends Controller
{
    public function profile($student_id){
    	$student = Scholar::findOrFail($student_id);
    	$user_id = $student->user_id;
    	// $scholarships = Scholarships::
    	$user = User::findOrFail($user_id);
    	return view('profiles.profile_scholar', compact('student','user'));
    }

    public function profileStudent(){
    	$user_id = Auth::user()->user_id;
    	$user = User::findOrFail($user_id);
    	$student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
    	// $student_id = User::find($user_id)->user_student->student_id;
    	$student = Scholar::find($student_id)->first();
		$pending = Application::where('student_id','=', $student_id)
		    		->where('accept_status', '=','pending')
		    		->where('avail_status','=','pending')
		    		->count();
		$scholarships = Application::where('student_id', '=', $student_id)
    		->where('accept_status','=','accept')
    		->where('avail_status','=','accept')
    		->count();

    	return view('profiles.profile_scholar', compact('student', 'user','pending','scholarships'));

    }
}
