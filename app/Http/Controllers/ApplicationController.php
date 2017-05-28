<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Application;
use App\Scholarship;
use App\Notification;
use Carbon\Carbon;
use App\Sponsor;
// use 
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

    public function viewQuestionaire(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);
        return view('registration/scholarship_application', compact('student','user'));
    }
}