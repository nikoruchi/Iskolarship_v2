<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\User;
use App\Sponsor;
use Hash;

class SponsorAuthController extends Controller{

    public function showSponsorForm(){
        return view("registration.sponsor_form");
    }


    public function Validation(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'min:6|required|same:repassword',
            'repassword' => 'min:6|same:password',
            'contact' => 'required|regex:/(09)[0-9]{9}/',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'curr_agency' => 'required',
            'addr_agency' => 'required',
            'job_title' => 'required',

        ]);
        
        if ($validator->fails()) {
            return redirect('/registration/Sponsor Form')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $this->RegisterSponsor($request);
        }
    }


    public function RegisterSponsor(Request $request){
        $user = new User;
        $user ->email = $request ->email;
        $password = $request ->password;
        $user ->password = Hash::make($password);
        $user ->user_contact  = $request ->contact;
        $user ->user_type  = 'sponsor';
        $user ->user_aboutme  = 'WLA';
        $user ->user_imagepath  = 'default';
        $user ->save();

        $sponsor = new Sponsor;
        $lastId=$user->user_id;
        $sponsor ->user_id = $lastId;
        $sponsor ->sponsor_fname = $request ->fname;
        $sponsor ->sponsor_lname = $request ->lname;
        $sponsor ->sponsor_address = $request ->address;
        $sponsor ->sponsor_agency = $request ->curr_agency;
        $sponsor ->sponsor_agencyaddress = $request ->addr_agency;
        $sponsor ->sponsor_job = $request ->job_title;
        $sponsor ->save();

        return redirect('/home');
    }
}
