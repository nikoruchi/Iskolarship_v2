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
class EditProfileController_Scholar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id);
        return view('profiles/settings/edit_profile-scholar', compact('student','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function validatePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'min:6|required|same:repassword',
            'repassword' => 'min:6|same:password',
        ]);
        
        if ($validator->fails()) {
            return redirect('/Account Settings')
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
            'contact' => 'required|regex:/(09)[0-9]{9}/',
            'email' => 'required|email|max:255',
            Rule::unique('users')->ignore($user_id),
        ]);
        
        if ($validator->fails()) {
            return redirect('/Account Settings')
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
        return redirect('/profile scholar');
    }

    public function updateScholar(Request $request){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id);

        $user ->email = $request ->email;
        $user ->user_contact  = $request ->contact;
        $user ->user_aboutme  = $request ->aboutme;
        $user ->user_imagepath  = 'default';
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

        return redirect('/profile scholar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
} 
