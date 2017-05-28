<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Application;
use App\Sponsor;
use App\Scholarship;
use App\EssayQuestions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\EssayAnswer;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // from student 
    public function avail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='accept';
       $application->save();
       return redirect()->back();
    }

    public function rejectAvail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='reject';
       $application->save();
       return redirect()->back();
    }

    // from sponsor
    public function accept(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='accept';
       $application->save();
       return redirect()->back();
    }

    public function reject(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='reject';
       $application->save();
       return redirect()->back();
    }

    // remove as scholar
    public function remove(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='reject';
       $application->avail_status='reject';
       $application->save();
       return redirect()->back();
    }

    public function viewQuestionaire($scholarship_id){
        $user_id = Auth::user()->user_id;
        // dd($user_id);
        $scholarship = Scholarship::find($scholarship_id);
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);
        $questions = EssayQuestions::where('scholarship_id','=',$scholarship_id)->get();
        return view('registration/scholarship_application', compact('questions','scholarship','student','user'));
    }

    public function sendApplication(Request $request){
      $agree = $request->agreement;
      $currentTime = Carbon::now()->toDateTimeString();
      $id = $request->scholarshipID;
      $user_id = Auth::user()->user_id;
      $student_id = Scholar::where('user_id','=',$user_id)->pluck('student_id')->first();
      if($agree!=null){

          // $validator = Validator::make($request->all(),[
          //     'answer.*' => 'required',
          // ])->validate()->withErrors($validator)->withInput();

          // if (!($validator->fails())) {
          //   return redirect('/registration/scholarship_application/$id')
          //               ->withErrors($validator)
          //               ->withInput();
          // }
            $answers = $request->answer;
            $questions = $request->qnID;
            $application = new Application;
            $application->scholarship_id=$id;
            $application->student_id=$student_id;
            $application->application_date=$currentTime;
            $application->accept_status='pending';
            $application->avail_status='pending';
            $application->save();
            $app_id = $application->application_id;

            for($i=0;$i<count($answers);$i++){
              $answer = new EssayAnswer;
              $answer->essay_questionsID=$questions[$i];
              $answer->application_id=$app_id;
              $answer->essay_answer=$answers[$i];
              $answer->save();
            }
            return redirect('profile scholar');
            // return redirect('/profile scholarship/{$id}');

            // }
      } else {
        // did not agree
        
        dd("bad");
      }
    }
}