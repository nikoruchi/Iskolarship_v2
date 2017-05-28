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
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::find($student_id);

        return view('profiles.settings.scholar_setup_form', compact('user', 'student', 'student_id')); 
    }

    public function viewSetup(){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::find($student_id);

        return view('profiles.profile_scholar_setup', compact('user', 'student', 'student_id')); 
    }  

    public function editSetup(Request $request){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $student_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::find($student_id);

        $sibName = $request->sibling_name; 
        $sibScho = $request->sibling_scholarship;
        $sibUniv = $request->sibling_school;
        $relName = $request->relative_name;
        $relRela = $request->relative_relation;
        $relNatu = $request->relative_nature;
        $relAver = $request->relative_average;
        $details = $request->details;

        // return $details[19];

        $parents_info = new ApplicationParentsInfo;
        $parents_info->student_id        = $student_id;
        $parents_info->father_type       = $details[0];
        $parents_info->father_name       = $details[1];
        $parents_info->father_occupation = $details[2];
        $parents_info->father_education  = $details[3];
        $parents_info->father_tribe      = $details[4];
        $parents_info->mother_type       = $details[5];
        $parents_info->mother_name       = $details[6];
        $parents_info->mother_occupation = $details[7];
        $parents_info->mother_education  = $details[8];
        $parents_info->mother_tribe      = $details[9]; 
        $parents_info->save();
        // return $parents_info;


        $family_financial = new ApplicationFamilyFinancial;
        $family_financial->student_id               = $student_id;
        $family_financial->father_employername      = $details[10];
        $family_financial->father_employeraddress   = $details[11];
        $family_financial->father_AGincome          = $details[12];
        $family_financial->father_selfAGincome      = $details[13];
        $family_financial->mother_employername      = $details[14];
        $family_financial->mother_employeraddress   = $details[15];
        $family_financial->mother_AGincome          = $details[16];
        $family_financial->mother_selfAGincome      = $details[17];
        $family_financial->beneficiary_dswd4ps      = $details[18];
        $family_financial->housing_ownershiptype    = $details[19];
        $family_financial->housing_rental           = $details[20];
        $family_financial->housing_amortization     = $details[21];
        $family_financial->save();
        // return $family_financial;

        $family_appliances = new ApplicationFamilyAppliances;
        $family_appliances->student_id          = $student_id;
        $family_appliances->aircon_num          = $details[22];
        $family_appliances->aircon_acquisition = $details[23];
        $family_appliances->camera_num          = $details[24];
        $family_appliances->camera_acquisition  = $details[25];
        $family_appliances->vehicle_num         = $details[26];
        $family_appliances->vehicle_acquisition = $details[27];
        $family_appliances->jeep_num            = $details[28];
        $family_appliances->jeep_acquisition    = $details[29];
        $family_appliances->ipad_num            = $details[30];
        $family_appliances->ipad_acquisition    = $details[31];
        $family_appliances->laptop_num          = $details[32];
        $family_appliances->laptop_acquisition  = $details[33];
        $family_appliances->freezer_num         = $details[34];
        $family_appliances->freezer_acquisition = $details[35];
        $family_appliances->dryer_num           = $details[36];
        $family_appliances->dryer_acquisition   = $details[37];
        $family_appliances->pump_num            = $details[38];
        $family_appliances->pump_acquisition    = $details[39];
        $family_appliances->save();
        // return $family_appliances;

        // $sibName = $request->sibling_name; 
        // $sibScho = $request->sibling_scholarship;
        // $sibUniv = $request->sibling_school;
        // $relName = $request->relative_name;
        // $relRela = $request->relative_relation;
        // $relNatu = $request->relative_nature;
        // $relAver = $request->relative_average;
        // $details = $request->details;


        // $parents_info = new ApplicationParentsInfo;
        // $parents_info->student_id        = $student_id;
        // $parents_info->father_type       = $request->father_status;
        // $parents_info->father_name       = $request->father_name;
        // $parents_info->father_occupation = $request->father_occ;
        // $parents_info->father_education  = $request->father_edu;
        // $parents_info->father_tribe      = $request->father_trib;
        // $parents_info->mother_type       = $request->mother_status;
        // $parents_info->mother_name       = $request->mother_name;
        // $parents_info->mother_occupation = $request->mother_occ;
        // $parents_info->mother_education  = $request->mother_edu;
        // $parents_info->mother_tribe      = $request->mother_trib; 
        // $parents_info ->save();


        // $family_financial = new ApplicationFamilyAppliances;
        // $family_financial->student_id               = $student_id;
        // $family_financial->father_employername      = $request->father_emp_name;
        // $family_financial->father_employeraddress   = $request->father_emp_add;
        // $family_financial->father_AGincome          = $request->father_income;
        // $family_financial->father_selfAGincome      = $request->father_self_income;
        // $family_financial->mother_employername      = $request->mother_emp_name;
        // $family_financial->mother_employeraddress   = $request->mother_emp_add;
        // $family_financial->mother_AGincome          = $request->mother_income;
        // $family_financial->mother_selfAGincome      = $request->mother_self_income;
        // $family_financial->beneficiary_dswd4ps      = $request->Fourps;
        // $family_financial->housing_ownershiptype    = $request->h_unit;
        // $family_financial->housing_rental           = $request->mon_rent;
        // $family_financial->housing_amortization     = $request->mon_amor;
        // $family_financial ->save();


        // $family_appliances = new ApplicationFamilyAppliances;
        // $family_appliances->student_id          = $student_id;
        // $family_appliances->aircon_num          = $request->ac_no;
        // $family_appliances->aircon_acquisitiion = $request->ac_mod_acq;
        // $family_appliances->camera_num          = $request->cam_no;
        // $family_appliances->camera_acquisition  = $request->cam_mod_acq;
        // $family_appliances->vehicle_num         = $request->veh_no;
        // $family_appliances->vehicle_acquisition = $request->veh_mod_acq;
        // $family_appliances->jeep_num            = $request->jeep_no;
        // $family_appliances->jeep_acquisition    = $request->jeep_mod_acq;
        // $family_appliances->ipad_num            = $request->ip_no;
        // $family_appliances->ipad_acquisition    = $request->ip_mod_acq;
        // $family_appliances->laptop_num          = $request->com_no;
        // $family_appliances->laptop_acquisition  = $request->com_mod_acq;
        // $family_appliances->freezer_num         = $request->frz_no;
        // $family_appliances->freezer_acquisition = $request->frz_mod_acq;
        // $family_appliances->dryer_num           = $request->dry_no;
        // $family_appliances->dryer_acquisition   = $request->dry_mod_acq;
        // $family_appliances->pump_num            = $request->pmp_no;
        // $family_appliances->pump_acquisition    = $request->pmp_mod_acq;
        // $family_appliances ->save();


        for($i=0;$i<count($relName);$i++){
            $rel_con = new ApplicationRelativeContribution;
            $rel_con->student_id = $student_id;
            $rel_con->relative_name = $relName[$i];
            $rel_con->relative_relationship = $relRela[$i];
            $rel_con->relative_averagecontribution = $relAver[$i];
            $rel_con->relative_natureofcontribution = $relNatu[$i];
            $rel_con->save();
        }


        for($i=0;$i<count($sibName);$i++){
            $sib_scho = new ApplicationSiblingScholar;
            $sib_scho->student_id = $student_id;
            $sib_scho->sibling_name = $sibName[$i];
            $sib_scho->sibling_scholarship = $sibScho[$i];
            $sib_scho->sibling_courseschool = $sibUniv[$i];
            $sib_scho->save();
        }
        return redirect('/profile scholar');
    }
}  



