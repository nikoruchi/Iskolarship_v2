<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholarship;
use App\Scholar;
use App\User;
use Auth;
use App\Application;
use DB;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller{

    public function viewHome(){
        // dd("ye");
        $scholarships = Scholarship::orderByRaw("RAND()")
            ->take(5)
            ->get();
        return view('home',compact('scholarships'));
    }
    
    public function viewProfile(){
		// $pending = Application::where('student_id','=', $student_id)
        // ->where('accept_status', '=','pending')
        // ->where('avail_status','=','pending')
        // ->get();
		$scholarships = Application::where('student_id', '=', $student_id)
    		->where('accept_status','=','accept')
    		->where('avail_status','=','accept')
    		->get();

  	
        return view('profiles.profile_scholar', compact('studentProfile','student', 'user','scholarships','pendingAvail')); 
    }  
}