<?php

namespace App\Http\Controllers;
use Auth; 
use App\User;
use App\Sponsor;
use App\Scholar;
use App\Scholarship;
use Illuminate\Http\Request; 
use App\ScholarshipsDeadline;
use App\ScholarshipGrant;

use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class UploadImgScholarships extends Controller
{

    public function showImg($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id);
        $scholarship = Scholarship::find($scholarship_id);
        return view('profiles.settings.upload_img-scholarship',
            compact('user', 'sponsor', 'sponsor_id', 'user_id', 'scholarship','scholarship_id')
            ); 
    }


    
public function uploadImg(Request $request, $scholarship_id){
        
        $validator = Validator::make($request->all(),[
            'image' => 'image|required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('edit', [$scholarship_id])->withInput()->withErrors($validator);
        }
        else {
            if (Input::file('image')->isValid()) {
                $destinationPath = 'image'; 
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = rand(0,99999).'.'.$extension; 
                
                $scholarship = new Scholarship;
                $scholarship->where('scholarship_id', '=', $scholarship_id)->update(['scholarship_logo' => $fileName]);

                Input::file('image')->move($destinationPath, $fileName);

                Session::flash('success', 'Upload successfully');
                return Redirect::to('profile scholarship',[$scholarship_id]);
            }
            else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('edit', [$scholarship_id]);
            }
        }

    }
}