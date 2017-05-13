<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\User;
use Auth;
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
    	$stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
    	$student = Scholar::findOrFail($stud_id);
    	return view('profiles.profile_scholar', compact('student','user'));
    }

    public function profileSponsor(){
    	$
    }
}
