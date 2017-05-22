<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\Sponsor;
use App\User;
use Auth;
use App\Application;
use DB;
class NotificationsController extends Controller{

    public function viewNotifications(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::find($student_id);

        return view('profiles.notifications', compact('user', 'student', 'student_id')); 
    }  
}


