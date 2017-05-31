<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Application;
use App\Scholarship;
use App\Notification;
use App\Sponsor;
use App\EssayQuestions;
use App\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\EssayAnswer;
use App\ApplicationSiblingScholar;
use App\ApplicationRelativeContribution;
use App\ApplicationFamilyFinancial;
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

       $scholarship = Scholarship::findOrFail($application->scholarship_id);
       $student = Scholar::findOrFail($application->student_id);
       $sponsor = Sponsor::findOrFail($scholarship->sponsor_id);

       $notif = new Notification;
       $notif->notification_desc = $student->student_fname." ".$student->student_lname." confirmed his slot in".$scholarship->scholarship_name.".";
       $notif->notification_status = 'unread';
       $notif->application_id = $id;
       $notif->account_id = $sponsor->user_id;

       $notif->save();
       $application->save();
       return redirect()->back();
    }

    public function rejectAvail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='reject';

       $scholarship = Scholarship::findOrFail($application->scholarship_id);
       $student = Scholar::findOrFail($application->student_id);
       $sponsor = Sponsor::findOrFail($scholarship->sponsor_id);

       $notif = new Notification;
       $notif->notification_desc = $student->student_fname." ".$student->student_lname." rejected his slot in".$scholarship->scholarship_name.".";
       $notif->notification_status = 'unread';
       $notif->application_id = $id;
       $notif->account_id = $sponsor->user_id;

       $notif->save();
       $application->save();
       return redirect()->back();
    }

    // from sponsor
    public function accept(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='accept';

       $scholarship = Scholarship::findOrFail($application->scholarship_id);
       $student = Scholar::findOrFail($application->student_id);

       $notif = new Notification;
       $notif->notification_desc = "Your application in ".$scholarship->scholarship_name." has been accepted.";
       $notif->notification_status = 'unread';
       $notif->application_id = $id;
       $notif->account_id = $student->user_id;

       $notif->save();
       $application->save();

       return redirect()->back();
    }

    public function reject(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='reject';

       $scholarship = Scholarship::findOrFail($application->scholarship_id);
       $student = Scholar::findOrFail($application->student_id);

       $notif = new Notification;
       $notif->notification_desc = "Your application in ".$scholarship->scholarship_name." has been rejected.";
       $notif->notification_status = 'unread';
       $notif->application_id = $id;
       $notif->account_id = $student->user_id;

       $notif->save();
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
        $sponsor = Sponsor::findOrFail($scholarship->sponsor_id)->first();

        // var_dump($sponsor->user_id);

        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);
        $questions = EssayQuestions::where('scholarship_id','=',$scholarship_id)->get();
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        return view('registration/scholarship_application', compact('questions','scholarship','student', 'sponsor', 'user', 'unread', 'unnotif'));
    }

    public function sendApplication(Request $request){
      $agree = $request->agreement;
      $currentTime = Carbon::now()->toDateTimeString();
      $id = $request->scholarshipID;
      $sponsor = $request->sponsor;

      // dd($sponsor->user_id);

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

            $scholarship = Scholarship::findOrFail($application->scholarship_id);

            $notif = new Notification;
            $notif->notification_desc = "A student applied for ".$scholarship->scholarship_name.".";
            $notif->notification_status = 'unread';
            $notif->application_id = $app_id;
            $notif->account_id = $sponsor;

            $notif->save();


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

    public function viewApplication($app_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);
        // $app_id = $app_id - 1;
        $app = Application::find($app_id)->first();
        $scholarship_id = $app->scholarship_id;
        $stud_id = $app->student_id;
        $siblings = ApplicationSiblingScholar::where('student_id','=',$stud_id)->first();
        $relatives = ApplicationRelativeContribution::where('student_id','=',$stud_id)->first();
        $four = ApplicationFamilyFinancial::where('student_id','=',$stud_id)->pluck('beneficiary_dswd4ps')->first();
        $type = ApplicationFamilyFinancial::where('student_id','=',$stud_id)->pluck('housing_ownershiptype')->first();
        $answers = EssayAnswer::where('application_id','=',$app_id)->get();
        $questions = EssayQuestions::where('scholarship_id','=',$scholarship_id)->get();
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        $i = 0;
                // $four = ApplicationFamilyFinancial::where('student_id','=',$stud_id)->pluck('beneficiary_dswd4ps')->first();
        return view('profiles/application', compact('questions','answers','sponsor','user','app','siblings','relatives','four','type', 'unread', 'unnotif'));
    }
}