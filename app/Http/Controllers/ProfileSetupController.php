<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholar;
use App\User;
use App\ApplicationFamilyAppliances;
use App\ApplicationFamilyFinancial;
use App\ApplicationParentsInfo;
use App\ApplicationRelativeContribution;
use App\ApplicationSiblingScholar;
use Auth;
use App\Application;
use DB;
class ProfileSetupController extends Controller{

    public function viewSetupForm(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::find($student_id);

        return view('profiles.settings.scholar_setup_form', compact('user', 'student', 'student_id')); 
    }

    public function viewSetup(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::find($student_id);

        return view('profiles.profile_scholar_setup', compact('user', 'student', 'student_id')); 
    }  

    public function editSetup(Request $request){
        $family_appliances = new ApplicationFamilyAppliances;
        $family_appliances ->save();

        $family_financial = new ApplicationFamilyAppliances;
        $family_financial ->save();

        $parents_info = new ApplicationParentsInfo;
        $parents_info ->save();

        $rel_con = new ApplicationRelativeContribution;
        $rel_con ->save();

        $sib_scho = new ApplicationSiblingScholar;
        $sib_scho ->save();
    }
}  



