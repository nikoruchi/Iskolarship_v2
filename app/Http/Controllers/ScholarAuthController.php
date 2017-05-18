<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\User;
use App\Scholar;
use Hash;

class ScholarAuthController extends Controller{

    public function showScholarForm(){
        return view("registration.scholar_form");
    }


    public function Validation(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'min:6|required|same:repassword',
            'repassword' => 'min:6|same:password',
            'contact' => 'required|regex:/(09)[0-9]{9}/',
            'bdate' => 'required|date',
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required|in:male,female',
            'address' => 'required',
            'region' => 'required',
            'ntnlty' => 'required',
            'begin_study' => 'required|date',
            'degree_att' => 'required',
            'field' => 'required',
            'degree_st' => 'required',
            'univ' => 'required',
            'univ_address' => 'required'

        ]);
        
        if ($validator->fails()) {
            return redirect('/registration/Student Form')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $this->RegisterScholar($request);
        }
    }


    public function RegisterScholar(Request $request){
        $user = new User;
        $user ->email = $request ->email;
        $password = $request ->password;
        $user ->password = Hash::make($password);
        $user ->user_contact  = $request ->contact;
        $user ->user_type  = 'student';
        $user ->user_aboutme  = '';
        $user ->user_imagepath  = 'default';
        $user ->save();

        $student = new Scholar;
        $lastId=$user->user_id;
        $student ->user_id = $lastId;
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
        return redirect('/home');
    } 
}
