<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Scholar;
use App\Scholarships;
use App\Sponsor;
use App\User;

class SearchController extends Controller
{
    
    public function searchStudent() {
        // //
        // $sponnum = 0;
        // $schonum = 0;
        // $shipnum = 0;
        // $opennum = 0;
        // $keyword = $request->keyword;

        $scholarships = '';
        $sponsors =  '';
        $scholars = '';

        $keyword = Input::get('keyword');
        $filter = Input::get('search_q');
        $size = count('search_q');

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id);

        if($keyword != ''){
            if($size > 0){
                foreach($filter as $filt){
                    if($filt == "scholarships"){
                            $scholarships = Scholarships::where('scholarship_name','LIKE','%'.$keyword.'%')
                                ->orderBy('scholarship_name')
                                ->get();
                    }
                    if($filt == "scholars"){
                            $scholars = Scholar::where('student_fname','LIKE','%'.$keyword.'%')
                                ->orWhere('student_lname','LIKE','%'.$keyword.'%')
                                ->orderBy('student_fname')
                                ->get();
                    }
                    if($filt == "sponsors"){
                            $sponsors = Sponsor::where('sponsor_fname','LIKE','%'.$keyword.'%')
                                ->orWhere('sponsor_lname','LIKE','%'.$keyword.'%')
                                ->orderBy('sponsor_fname')
                                ->get();
                    }
                    if($filt == "open_scholarships"){
                        // $scholarships = Scholarships::where('scholarship_name','LIKE','%'.$keyword.'%')
                        //         ->orderBy('scholarship_name')
                        //         ->
                        //         ->get();
                    }
                }

            } elseif($size == 0) {
                $scholarships = Scholarships::where('scholarship_name','LIKE','%'.$keyword.'%')
                    ->orderBy('scholarship_name')
                    ->get();
                $scholars = Scholar::where('student_fname','LIKE','%'.$keyword.'%')
                    ->orWhere('student_lname','LIKE','%'.$keyword.'%')
                    ->orderBy('student_fname')
                    ->get();
                $sponsors = Sponsor::where('sponsor_fname','LIKE','%'.$keyword.'%')
                    ->orWhere('sponsor_lname','LIKE','%'.$keyword.'%')
                    ->orderBy('sponsor_fname')
                    ->get();
            }
        }

        return view('search_results',compact('student','scholarships','scholars','sponsors','keyword','user'));
    }
}
