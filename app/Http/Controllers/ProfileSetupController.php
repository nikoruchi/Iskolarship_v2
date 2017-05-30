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

    public  function createSetup($parents_info, $family_financial, $family_appliances, $rel_con, $sib_scho, $student_id, $details, $sibName, $sibScho, $sibUniv, $relName, $relRela, $relNatu, $relAver, $exist){
        
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


        for($i=0;$i<count($relName);$i++){
            if($exist){
                $rel_con = new ApplicationRelativeContribution;
            } 
            $rel_con->student_id = $student_id;
            $rel_con->relative_name = $relName[$i];
            $rel_con->relative_relationship = $relRela[$i];
            $rel_con->relative_averagecontribution = $relAver[$i];
            $rel_con->relative_natureofcontribution = $relNatu[$i];
            $rel_con->save();
        }


        for($i=0;$i<count($sibName);$i++){
            if($exist){
                $sib_scho = new ApplicationSiblingScholar; 
            }    
            $sib_scho->student_id = $student_id;
            $sib_scho->sibling_name = $sibName[$i];
            $sib_scho->sibling_scholarship = $sibScho[$i];
            $sib_scho->sibling_courseschool = $sibUniv[$i];
            $sib_scho->save();
        }
        return redirect('/profile scholar');
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
        // return $relName;
        // return $details[19];

        if(!(ApplicationParentsInfo::where('student_id', '=', $student_id)->exists())){
            $parents_info = new ApplicationParentsInfo;
            $family_financial = new ApplicationFamilyFinancial;
            $family_appliances = new ApplicationFamilyAppliances;
            $rel_con = new ApplicationRelativeContribution;
            $sib_scho = new ApplicationSiblingScholar;
            $exist = true;
            $save = $this->createSetup($parents_info, $family_financial, $family_appliances, $rel_con, $sib_scho,$student_id,$details,
             $sibName, 
             $sibScho,
             $sibUniv,
             $relName,
             $relRela,
             $relNatu,
             $relAver,
             $details,
             $exist
              );

        } 
        $parents_info = ApplicationParentsInfo::where('student_id','=', $student_id)->first();
        $family_financial = ApplicationFamilyFinancial::where('student_id','=', $student_id)->first();
        $family_appliances = ApplicationFamilyAppliances::where('student_id','=', $student_id)->first();
        $rel_con = ApplicationRelativeContribution::where('student_id','=', $student_id)->first();
        $exist = false;
        $sib_scho = ApplicationSiblingScholar::where('student_id','=', $student_id)->first();
        $update = $this->createSetup($parents_info, $family_financial, $family_appliances, $rel_con, $sib_scho,$student_id,$details,
             $sibName, 
             $sibScho,
             $sibUniv,
             $relName,
             $relRela,
             $relNatu,
             $relAver,
             $details,
             $exist
            );
    }
}  



