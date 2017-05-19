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

Route::get('/profile sponsor', 'ProfileController@profileSponsor');

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
        case 'sponsor':
          return (new \App\Http\Controllers\ScholarshipsController)->scholarshipSponsor($scholarship_id);
        break;

// Route::get('/profile scholarship/{scholarship_id}', 'ProfileController@homeSponsor');

        case 'student':
          return (new \App\Http\Controllers\ScholarshipsController)->scholarshipStudent($scholarship_id);
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
Route::get('/messages', ['middleware'=>'isguest','uses'=>'MessagesController@index']);
Route::get('/messages/read', ['middleware'=>'isguest','uses'=>'MessagesController@getReadMsg']);
Route::get('/messages/unread', ['middleware'=>'isguest','uses'=>'MessagesController@getUnReadMsg']);
Route::get('/messages/inbox', ['middleware'=>'isguest','uses'=>'MessagesController@getAllMsg']);
Route::post('/messages/send', ['middleware'=>'isguest','uses'=>'MessagesController@send']);
Route::get('/messages/thread',['middleware'=>'isgues','uses'=>'MessagesController@showThread']);


//================ SEARCH THINGY ===============================
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

Route::get('/scholarship form', function () {
    return view('registration/scholarship_form');
});

//=============== END FOR FRONT-END PURPOSES =======================


Route::get('/Account Settings', 'EditProfileController_Scholar@show');
Route::post('/Update Profile', 'EditProfileController_Scholar@ValidationScholar');
Route::post('/Change Password', 'EditProfileController_Scholar@validatePassword');
Route::post('/upload', 'EditProfileController_Scholar@upload');


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