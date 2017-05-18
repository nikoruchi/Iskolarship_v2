<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/registration/Student Form', function () {
    return view('registration/scholar_form');
}); 

Route::get('/registration/Sponsor Form', function () {
    return view('registration/sponsor_form');
});

Route::post('/registration/Student', 'ScholarAuthController@Validation');

Route::post('/registration/Sponsor', 'SponsorAuthController@Validation');

Route::get('/profile scholar', 'ProfileController@profileStudent');

Route::get('/profile scholar/{student_id}', 'ProfileController@profileNotStudent');
	
// will change into something more elegant. band aid solution
Route::get("/home", function(){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\HomeController)->homeSponsor();
        break;

        case 'student':
          return (new \App\Http\Controllers\HomeController)->homeStudent();
        break;
    }
});

Route::get("/profile scholarship/{scholarship_id}", function($scholarship_id){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\ProfileController)->scholarshipSponsor($scholarship_id);
        break;

        case 'student':
          return (new \App\Http\Controllers\ProfileController)->scholarshipStudent($scholarship_id);
        break;
    }
});


//=============== FOR FRONT-END PURPOSES =======================

Route::get('/search', function () {
    return view('user/search');
});


Route::get('/Account Settings', 'EditProfileController@show');
Route::post('/Update Profile', 'EditProfileController@updateScholar');


// MESSAGES
Route::get("/messages", function(){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\MessagesController)->indexSponsor();
        break;

        case 'student':
          return (new \App\Http\Controllers\MessagesController)->indexStudent();
        break;
    }
});

Route::get('/messages/read', ['middleware'=>'isguest','uses'=>'MessagesController@getReadMsg']);

Route::get('/messages/unread', ['middleware'=>'isguest','uses'=>'MessagesController@getUnReadMsg']);

Route::get('/messages/inbox', ['middleware'=>'isguest','uses'=>'MessagesController@getAllMsg']);

Route::post('/messages/send', ['middleware'=>'isguest','uses'=>'MessagesController@send']);

// APPLICATION STATUS CHANGES
Route::post('/application/avail','ApplicationController@avail');

Route::post('/application/rejectAvail','ApplicationController@rejectAvail');

Route::post('/application/accept','ApplicationController@accept');

Route::post('/application/reject', 'ApplicationController@reject');