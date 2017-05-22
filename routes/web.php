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
// Route::get('/', 'LoginController@showLoginForm');
// Route::post('login',  'LoginController@login'); //INSERTED
//========================= USER SIGN-UP ============================
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
//============================ CHECKERS =========================
// This will be changed as soon as auth and middleware is added
Route::get('/profile scholar', 'ProfileController@profileStudent');
// Route::get('/home', ['middleware']=>'sponsor','uses'=>'HomeController@homeSponsor']);
// Route::get('/home', 'HomeController@homeGuests');

Route::get('/profile scholar', 'ScholarController@viewProfile');

Route::get('/profile scholar/{student_id}', 'ProfileController@profileNotStudent');

Route::get('/profile sponsor', 'SponsorController@viewProfile');

Route::get('/profile sponsor/scholars', 'ProfileController@viewScholars');


	
// will change into something more elegant. band aid solution
Route::get("/home", function(){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\SponsorController)->viewHome();
        break;
        case 'student':
          return (new \App\Http\Controllers\ScholarController)->viewHome();
        break;
    }
});

Route::get("/profile scholarship/{scholarship_id}", function($scholarship_id){
    switch(Auth::user()->user_type){
    // if(Auth::user()->user_type)
        case 'sponsor':
          return (new \App\Http\Controllers\ScholarshipsController)->scholarshipSponsor($scholarship_id);
        break;

// Route::get('/profile scholarship/{scholarship_id}', 'ProfileController@homeSponsor');

        case 'student':
          return (new \App\Http\Controllers\ScholarshipsController)->scholarshipStudent($scholarship_id);
        break;
    }
    // if(Auth::guest()){
        // return view('profiles.profile_scholarship');
    // }
});

//=============== FOR FRONT-END PURPOSES =======================

Route::get('/scholarship form', 'ScholarshipsController@createForm');

Route::get('/notifications', 'NotificationsController@viewNotifications');

Route::get('/scholar setup', 'ProfileSetupController@viewSetup');

Route::get('/scholar setup form', 'ProfileSetupController@viewSetupForm');

//=============== END FOR FRONT-END PURPOSES =======================


Route::get('/Scholar/Account Settings', 'EditProfileController_Scholar@show');
Route::post('/Scholar/Update Profile', 'EditProfileController_Scholar@ValidationScholar');
Route::post('/Scholar/Change Password', 'EditProfileController_Scholar@validatePassword');
Route::post('/Scholar/upload', 'EditProfileController_Scholar@upload');

Route::get('/Sponsor/Account Settings', 'EditProfileController_Sponsor@show');
Route::post('/Sponsor/Update Profile', 'EditProfileController_Sponsor@ValidationSponsor');
Route::post('/Sponsor/Change Password', 'EditProfileController_Sponsor@validatePassword');
Route::post('/Sponsor/upload', 'EditProfileController_Sponsor@upload');


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

Route::get('/messages/thread', ['middleware'=>'isguest','uses'=>'MessagesController@showThread']);

Route::get('/messages/compose', ['middleware'=>'isguest','uses'=>'MessagesController@compose']);

Route::delete('/messages/delete', ['middleware'=>'isguest','uses'=>'MessagesController@destroy']);

Route::post('/messages/reply', ['middleware'=>'isguest','uses'=>'MessagesController@sendreply']);


// APPLICATION STATUS CHANGES
Route::post('/application/avail','ApplicationController@avail');

Route::post('/application/rejectAvail','ApplicationController@rejectAvail');

Route::post('/application/accept','ApplicationController@accept');

Route::post('/application/reject', 'ApplicationController@reject');

// for SEARCH THINGY
Route::get("/search", function(){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\SearchController)->searchSponsor();
        break;
        case 'student':
          return (new \App\Http\Controllers\SearchController)->searchStudent();
        break;
    }
});
