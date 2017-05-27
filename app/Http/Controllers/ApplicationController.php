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

    // from student 
    public function avail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='accept';
       $application->save();
       return redirect()->back();
    }

    public function rejectAvail(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->avail_status='reject';
       $application->save();
       return redirect()->back();
    }

    // from sponsor
    public function accept(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='accept';
       $application->save();
       return redirect()->back();
    }

    public function reject(Request $request){
       $id = $request->input('app_id');
       $application = Application::find($id);
       $application->accept_status='reject';
       $application->save();
       return redirect()->back();
    }
}