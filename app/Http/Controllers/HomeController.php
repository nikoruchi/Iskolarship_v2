<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Sponsor;
class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function homeGuests()
    {
        return view('/');
    }

    public function homeSponsor(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id)->first();
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');
        $sponsor = Sponsor::findOrFail($sponsor_id)->first();
        return view('home', compact('sponsor', 'user'));
    }

    public function homeStudent(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id)->first();
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id)->first();
        return view('home', compact('student', 'user'));
    }
}
