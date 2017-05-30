<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Sponsor;
use App\Message;
use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EditProfileController_Scholar extends Controller{

    public function upload (Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'image|required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('/Scholar/Account Settings')->withInput()->withErrors($validator);
        }
        else {
            if (Input::file('image')->isValid()) {
                $destinationPath = 'image'; 
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = rand(0,99999).'.'.$extension; 
                
                $user = new User;
                $user->where('user_id', '=', Auth::user()->user_id)->update(['user_imagepath' => $fileName]);

                Input::file('image')->move($destinationPath, $fileName);

                Session::flash('success', 'Upload successfully');
                return Redirect::to('/Scholar/Account Settings');
            }
            else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/Scholar/Account Settings');
            }
        }
    }

    public function show(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);
        $notification = Notification::join('application', 'Application.application_id','=','Notification.application_id')
        	->where('Notification.account_id','=',$user_id)
        	->select('Notification.notification_id','Notification.notification_desc','Notification.notification_date','Notification.notification_status','Notification.application_id','Notification.account_id','Application.scholarship_id','Application.student_id')
        	->get();
        $unnotif = count($notification);
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->count();
        return view('profiles/settings/edit_profile-scholar', compact('student','user', 'unread', 'unnotif'));
    }


    public function validatePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'min:6|required|same:repassword',
            'repassword' => 'min:6|same:password',
        ]);
        
        if ($validator->fails()) {
            return redirect('/Scholar/Account Settings')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $this->updateScholarPass($request);
        }
    }

    public function ValidationScholar(Request $request){
        $user_id = Auth::user()->user_id;

        $validator = Validator::make($request->all(),[
            'contact' => 'regex:/(09)[0-9]{9}/',
            'email' => 'email|max:255',
            Rule::unique('users')->ignore($user_id),
        ]);
        
        if ($validator->fails()) {
            return redirect('/Scholar/Account Settings')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $this->updateScholar($request);
        }
    }

    public function updateScholarPass(Request $request){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $password=$request->password;
        $user ->password = Hash::make($password);
        $user->save();
        Session::flash('success_pass', 'Password Updated');
        return redirect('/Scholar/Account Settings');
    }

    public function updateScholar(Request $request){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);

        if (empty($request ->email)){
            $request ->email = $user ->email;
        }
        if (empty($request ->contact)){
            $request ->contact = $user ->user_contact;
        }
        if (empty($request ->aboutme)){
            $request ->aboutme = $user ->user_aboutme;
        }
        $user ->email = $request ->email;
        $user ->user_contact  = $request ->contact;
        $user ->user_aboutme  = $request ->aboutme;
        $user ->save();

        if (empty($request ->fname)){
            $request ->fname = $student ->student_fname;
        }
        if (empty($request ->lname)){
            $request ->lname = $student ->student_lname;
        }
        if (empty($request ->bdate)){
            $request ->bdate = $student ->student_birthdate;
        }
        if (empty($request ->address)){
            $request ->address = $student ->student_address;
        }
        if (empty($request ->begin_study)){
            $request ->begin_study= $student ->student_beginstudies;
        }
        if (empty($request ->field)){
            $request ->field = $student ->student_studyfield;
        }
        if (empty($request ->univ)){
            $request ->univ = $student ->student_university;
        }
        if (empty($request ->univ_address)){
            $request ->univ_address = $student ->student_universityaddress;
        }



        $student ->student_fname = $request ->fname;
        $student ->student_lname = $request ->lname;
        $student ->student_gender = $request ->gender;
        $student ->student_birthdate = $request ->bdate;
        $student ->student_address = $request ->address;
        $student ->student_region = $request ->region;
        $student ->student_nationality = $request ->ntnlty;
        $student ->student_beginstudies = $request ->begin_study;
        $student ->student_highestdegree = $request ->degree_att;
        $student ->student_studyfield = $request ->field;
        $student ->student_degreesought = $request ->degree_st;
        $student ->student_university = $request ->univ;
        $student ->student_universityaddress = $request ->univ_address;
        $student ->save();

        Session::flash('success_update', 'Account Information Updated');
        return redirect('/Scholar/Account Settings');
    }

} 
