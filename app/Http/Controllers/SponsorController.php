<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use App\Scholar;
use App\User;
use App\Scholarship;
use Auth;
use App\Application;
use DB;
use Illuminate\Support\Facades\Log;
class SponsorController extends Controller{

     public function viewHome(){
        $scholarships = Scholarship::all();

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);
        return view('home', compact('sponsor', 'user', 'scholarships'));
    }
   
    public function viewProfile(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);

        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id);

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id');
        $user1 = User::findOrFail($user_id1);

        $scholarships = Scholarship::where('sponsor_id', "=", $sponsor_id)->orderBy('scholarship_name')->get();

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id')->first();
        $user1 = User::findOrFail($user_id1);

        return view('profiles.profile_sponsor', compact('sponsor', 'user', 'scholarships', 'user1'));       
    } 

    public function viewSearchfromStudent($sponsor_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);

        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id);

        $sponsor_id1 = Sponsor::where('sponsor_id','=', $sponsor_id)->pluck('sponsor_id');
        $sponsor = Sponsor::find($sponsor_id1);

        $scholarships = Scholarship::where('sponsor_id', "=", $sponsor_id1)->orderBy('scholarship_name')->get();

        return view('profiles.profile_sponsor', compact('sponsor', 'student', 'user', 'scholarships'));       
    } 

    public function viewSearchfromSponsor($sponsor_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);

        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');
        $sponsor = Sponsor::findOrFail($spon_id);

        $sponsor_id2 = Sponsor::where('sponsor_id','=', $sponsor_id)->pluck('sponsor_id');
        $sponsor1 = Sponsor::find($sponsor_id2);

        $user_id1 = Sponsor::where('sponsor_id','=',$sponsor_id)->pluck('user_id')->first();
        $user1 = User::findOrFail($user_id1);

        $scholarships = Scholarship::where('sponsor_id', "=", $sponsor_id2)->orderBy('scholarship_name')->get();

        return view('profiles.profile_sponsor', compact('sponsor', 'sponsor1', 'user', 'user1', 'scholarships'));       
    } 


}