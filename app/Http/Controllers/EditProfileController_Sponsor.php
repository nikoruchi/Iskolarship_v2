<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EditProfileController_Sponsor extends Controller{

    public function upload (Request $request){
         $validator = Validator::make($request->all(),[
            'image' => 'image|required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('/Sponsor/Account Settings')->withInput()->withErrors($validator);
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
                return Redirect::to('/Sponsor/Account Settings');
            }
            else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/upload');
            }
        }
    }

    public function show(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spons_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spons_id);
        return view('profiles/settings/edit_profile-sponsor', compact('sponsor','user'));
    }

    public function validatePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'min:6|required|same:repassword',
            'repassword' => 'min:6|same:password',
        ]);
        
        if ($validator->fails()) {
            return redirect('/Sponsor/Account Settings')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $this->updateSponsorPass($request);
        }
    }

    public function ValidationSponsor(Request $request){
        $user_id = Auth::user()->user_id;

        $validator = Validator::make($request->all(),[
            'contact' => 'regex:/(09)[0-9]{9}/',
            'email' => 'email|max:255',
            Rule::unique('users')->ignore($user_id),
        ]);
        
        if ($validator->fails()) {
            return redirect('/Sponsor/Account Settings')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $this->updateSponsor($request);
        }
    }

    public function updateSponsorPass(Request $request){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $password=$request->password;
        $user ->password = Hash::make($password);
        $user->save();
        Session::flash('success_pass', 'Password Updated');
        return redirect('/Sponsor/Account Settings');
    }

    public function updateSponsor(Request $request){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spons_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spons_id);

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
            $request ->fname = $sponsor ->sponsor_fname;
        }
        if (empty($request ->lname)){
            $request ->lname = $sponsor ->sponsor_lname;
        }
        if (empty($request ->address)){
            $request ->address = $sponsor ->sponsor_address;
        }
        if (empty($request ->curr_agency)){
            $request ->curr_agency = $sponsor ->sponsor_agency;
        }
        if (empty($request ->addr_agency)){
            $request ->addr_agency = $sponsor ->sponsor_agencyaddress;
        }
        if (empty($request ->job_title)){
            $request ->job_title = $sponsor ->sponsor_job;
        }

        $sponsor ->sponsor_fname = $request ->fname;
        $sponsor ->sponsor_lname = $request ->lname;
        $sponsor ->sponsor_address = $request ->address;
        $sponsor ->sponsor_agency = $request ->curr_agency;
        $sponsor ->sponsor_agencyaddress = $request ->addr_agency;
        $sponsor ->sponsor_job = $request ->job_title;
        $sponsor ->save();
    
    Session::flash('success_update', 'Account Information Updated');

    return redirect('/Sponsor/Account Settings');
    }
} 
