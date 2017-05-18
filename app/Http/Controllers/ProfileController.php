<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Sponsor;
use App\User;
use Auth;
use App\Application;
use App\Scholarship;
use DB;
class ProfileController extends Controller
{
   public function profileSponsor(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        // $sponsor_id = User::find($user_id)->user_sponsor->sponsor_id;
        $sponsor = Sponsor::find($sponsor_id);
        return view('profiles.profile_sponsor', compact('sponsor', 'user'));       
    } 

    public function viewScholars(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id);
        return view('profiles.scholars', compact('sponsor', 'user'));       
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
    
}