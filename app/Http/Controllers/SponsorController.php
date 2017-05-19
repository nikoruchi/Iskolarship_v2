<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use App\User;
use Auth;
use App\Application;
use DB;
class SponsorController extends Controller{
     public function viewHome(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();

        $sponsor = Sponsor::findOrFail($spon_id);


        return view('home', compact('sponsor', 'user'));
    }
    
    public function viewProfile(){

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        // $sponsor_id = User::find($user_id)->user_sponsor->sponsor_id;
        $sponsor = Sponsor::find($sponsor_id);
        // $pending = Application::where('student_id','=', $student_id)
        //     ->where('accept_status', '=','pending')
        //     ->where('avail_status','=','pending')
            // ->deadline()->where('scholarship_deadlineenddate',)
        //     ->count();
        // $scholarships = Application::where('student_id', '=', $student_id)
        //     ->where('accept_status','=','accept')
        //     ->where('avail_status','=','accept')
        //     ->count();
        
        // $sponsors = DB::table('application')
        //         ->join('scholarship','application.scholarship_id','=','scholarship.scholarship_id')
        //         ->select('scholarship.sponsor_id')
        //         ->where('application.accept_status','=','accept')
        //         ->where('application.avail_status','=','accept')
        //         ->where('application.student_id','=',$student_id)
        //         ->distinct()->count();
        return view('profiles.profile_sponsor', compact('sponsor', 'user'));       
    } 
      
}


