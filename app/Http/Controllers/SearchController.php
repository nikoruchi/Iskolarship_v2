<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Scholar;
use App\Scholarships;
use App\Sponsor;
use App\User;

class SearchController extends Controller
{
    
    public function searchStudent() {
        //
        // $sponsors = '';
        // $scholars = '';
        // $scholarships = '';
        // $open_scholarships = '';
        // $keyword = $request->keyword;

        $keyword = Input::get('keyword');
        $filter = Input::get('search_q');
        $size = count('search_q');

        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id)->first();
        
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id)->first();

        if(!empty($keyword)){
        	// if($request->has('scholarships')){
        	// 	$scholarships = Scholarships::where('scholarship_name','LIKE','%$keyword%')->orderBy('scholarship_name')->paginate(5);
        	// }
        	// if($request->has('scholars')){
        	// 	$scholars = Scholars::where('student_fname','LIKE','%$keyword%','OR', 'student_lname','LIKE','%$keyword%')->orderBy('student_fname')->paginate(5);
        	// }
        	// if($request->has('sponsors')){
        	// 	$sponsors = Sponsors::where('sponsor_fname','LIKE','%$keyword%','OR', 'sponsor_lname','LIKE','%$keyword%')->orderBy('sponsor_fname')->paginate(5);
        	// } 
        	// if($request->has('open applications')){
        	// 	$open_scholarships = Scholarships::where('scholarship_name','LIKE','%$keyword%')->orderBy('scholarship_name')->paginate(5);
        	// }
        }

        return view('search_results',compact('student','filter','user'));
    }
}
