<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Sponsor;
use App\Scholar;
use App\Application;
use App\Scholarship;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ScholarshipsDeadline;

class ScholarshipsController extends Controller
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

    public function createForm()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $sponsor_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::find($sponsor_id);

        return view('registration.scholarship_form', compact('user', 'sponsor', 'sponsor_id')); 
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
    public function scholarshipStudent($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Scholar::findOrFail($stud_id);
        
        $scholarship = Scholarship::find($scholarship_id);
        $specifications = Scholarship::find($scholarship_id)->specifications;
        $grants = Scholarship::find($scholarship_id)->grants;
        $scholars = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->get();
        $exists = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->where('sponsor_id','=',$stud_id)
                    ->count();

        $currentTime = Carbon::now()->toDateTimeString();

        $deadline = ScholarshipsDeadline::find($scholarship_id)
                    ->scholarship_deadlineenddate;
     
        return view('/profiles/profile_scholarship', compact('sponsor','user','scholarship','specifications','grants','scholars','exists','currentTime','deadline'));
    }

     public function scholarshipSponsor($scholarship_id){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);

        $scholarship = Scholarship::find($scholarship_id);
        $specifications = Scholarship::find($scholarship_id)->specifications;
        $grants = Scholarship::find($scholarship_id)->grants;
        $scholars = Application::where('scholarship_id','=',$scholarship_id)
                    ->where('accept_status','=','accept')
                    ->where('avail_status','=','accept')
                    ->get();

        $currentTime = Carbon::now()->toDateTimeString();

        $deadline = ScholarshipsDeadline::find($scholarship_id)
                    ->scholarship_deadlineenddate;

        return view('/profiles/profile_scholarship', compact('sponsor','user','scholarship', 'deadline', 'currentTime', 'specifications','grants','scholars'));




        return view('/profiles/profile_scholarship', compact('sponsor','user','scholarship','specifications','grants','scholars','deadline','currentTime'));
    }
}
