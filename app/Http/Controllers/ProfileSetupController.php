<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Sponsor;
use App\User;
use Auth;
use App\Application;
use DB;
class ProfileSetupController extends Controller{

    public function viewSetupForm(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::find($student_id);

        return view('profiles.settings.scholar_setup_form', compact('user', 'student', 'student_id')); 
    }

    public function viewSetup(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::find($student_id);

        return view('profiles.scholar_setup', compact('user', 'student', 'student_id')); 
    }  
}  



