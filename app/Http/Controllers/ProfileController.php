<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Sponsor;
use App\User;
use Auth;
use App\Application;

class ProfileController extends Controller{
    
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
    
}