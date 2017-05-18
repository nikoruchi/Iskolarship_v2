<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sponsor;
use App\Scholar;
use App\User;
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

<<<<<<< HEAD
=======
    public function homeSponsor(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');

        $sponsor = Sponsor::findOrFail($spon_id);


        return view('home', compact('sponsor', 'user'));
    }
>>>>>>> 4966d5f8e2b496ae8616a5e968ce876a3e724d26

    public function homeStudent(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
<<<<<<< HEAD
        $student = Scholar::findOrFail($stud_id)->first();
=======

        $student = Scholar::findOrFail($stud_id);
>>>>>>> 4966d5f8e2b496ae8616a5e968ce876a3e724d26

        return view('home', compact('student', 'user'));
    }
}
 
