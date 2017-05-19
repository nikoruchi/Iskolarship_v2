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
    
  public function profileSponsor(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        // $sponsor_id = User::find($user_id)->user_sponsor->sponsor_id;
        $sponsor = Sponsor::find($sponsor_id);
        return view('profiles.profile_sponsor', compact('sponsor', 'user'));       
    } 
}


