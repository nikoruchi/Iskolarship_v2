<?php

namespace App\Http\Controllers;
use Auth; 
use App\User;
use App\Sponsor;
use App\Scholar;
use App\Application;
use App\Scholarship;
use Illuminate\Http\Request; 
use Carbon\Carbon;
use App\ScholarshipsDeadline;

class ScholarshipsController extends Controller
{

    public function createForm()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id);
        return view('registration.scholarship_form', compact('user', 'sponsor', 'sponsor_id', 'user_id')); 
    }


    public function createScholarship(Request $request){
 
        $details = $request->details;
        $grants = $request->grants;
        $specs = $request->specifications;
        $questions = $request->questions;
        $user_id = Auth::user()->user_id;
        $sponsor_id = Sponsor::where('user_id','=',$user_id)->pluck('sponsor_id')->first();
       
        $scholarship = new Scholarship;
        $scholarship->sponsor_id = $sponsor_id;
        $scholarship->scholarship_name = $details[0];
        $scholarship->scholarship_description = $details[1];
        $scholarship->scholarship_logo='default_logo';
        $scholarship->save();

        for(i=0;i<grants.length;i++){
            $grant = new ScholarshipGrant;
            $lastId = $scholarship->scholarship_id;
            $grant->scholarship_id = $lastId;
            $grant->scholarship_grantDesc=$grants[i];
            $grant->save();
        }

        for(i=0;i<specs.length;i++){
            $spec = new ScholarshipSpecification;
            $lastId = $scholarship->scholarship_id;
            $spec->scholarship_id = $lastId;
            $spec->scholarship_specDesc=$specs[i];
            $spec->save();
        }

        for(i=0;i<questions.length;i++){
            $question = new EssayQuestions;
            $lastId = $scholarship->scholarship_id;
            $question->scholarship_id = $lastId;
            $question->essay_question=$questions[i];
            $question->save();
        }
    }
 
    public function scholarshipStudent($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();

        $student = Scholar::findOrFail($stud_id);

        $scholarship = Scholarship::find($scholarship_id);
        $specifications = Scholarship::find($scholarship_id)->specifications;
        $grants = Scholarship::find($scholarship_id)->grants;
        $scholars = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->get();
        $exists = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->where('student_id','=',$stud_id)
                    ->count();

        $currentTime = Carbon::now()->toDateTimeString();

        $deadline = ScholarshipsDeadline::find($scholarship_id)
                    ->pluck('scholarship_deadlineenddate');

        // $deadline = ScholarshipsDeadline::where('scholarship_id','=',$scholarship_id)
        //     ->first()->scholarship_deadlineenddate;     
        return view('/profiles/profile_scholarship', compact('student','user','scholarship','specifications','grants','scholars','exists','currentTime','deadline'));
    }

     public function scholarshipSponsor($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);

        $scholarship = Scholarship::find($scholarship_id);
        $specifications = Scholarship::find($scholarship_id)->specifications;
        $grants = Scholarship::find($scholarship_id)->grants;
        $scholars = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->get();

        $currentTime = Carbon::now()->toDateTimeString();

        $deadline = ScholarshipsDeadline::where('scholarship_id','=',$scholarship_id)
            ->pluck('scholarship_deadlineenddate');

        return view('/profiles/profile_scholarship', compact('sponsor','user','scholarship', 'deadline', 'currentTime', 'specifications','grants','scholars'));
    }

}