<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\User;

class ProfileController extends Controller
{
    public function profile($student_id){
    	$student = Scholar::findOrFail($student_id);
    	$user_id = $student->user_id;
    	$user = User::findOrFail($user_id);
    	return view('profiles.profile_scholar', compact('student','user'));
    }
}
