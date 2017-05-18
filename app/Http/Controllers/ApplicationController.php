<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Application;
use App\Sponsor;
// use 
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function avail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='accept';
       $application->save();
       return redirect()->back();
    }

    public function accept(){

    }

    public function reject(){

    }

   	public function rejectAvail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='reject';
       $application->save();
       return redirect()->back();
   	}
}