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

Route::get('/home', function () {
    return view('home');
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

// Route::get('/home', ['middleware']=>'sponsor','uses'=>'HomeController@homeSponsor']);
// Route::get('/home', 'HomeController@homeGuests');

Route::get('/profile scholar', 'ScholarController@viewProfile');
Route::get('/profile scholar/{student_id}', 'ProfileController@profileNotStudent');

Route::get('/setup', 'ProfileSetupController@viewSetup');

Route::get('/profile sponsor', 'SponsorController@viewProfile');
Route::get('/profile sponsor/scholars', 'SponsorController@scholars');
  
// will change into something more elegant. band aid solution
Route::get("/home", function(){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\SponsorController)->viewHome();
        break;
        case 'student':
          return (new \App\Http\Controllers\ScholarController)->viewHome();
        break;
        default:
          return (new \App\Http\Controllers\GuestController)->viewHome();
        break;
    }
});

Route::get("/profile scholarship/{scholarship_id}", function($scholarship_id){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\ScholarshipsController)->scholarshipSponsor($scholarship_id);
        break;

        case 'student':
          return (new \App\Http\Controllers\ScholarshipsController)->scholarshipStudent($scholarship_id);
        break;
    }
});

// Route::resource('edit','UploadImgScholarships');
// Route::get('/edit/{scholarship_id}', 'UploadImgScholarships@showImg');
// Route::get('/edit/upload/{scholarship_id}', 'UploadImgScholarships@uploadImg');


//=============== FOR FRONT-END PURPOSES =======================

Route::get('/scholarship form', 'ScholarshipsController@createForm'); 
Route::get('/scholar setup', 'ProfileSetupController@viewSetup');

Route::get('/application/{app_id}', 'ApplicationController@viewApplication');

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

Route::get('/scholar questionaire/{scholarship_id}', 'ApplicationController@viewQuestionaire');
Route::post('/scholar questionaire/send', 'ApplicationController@sendApplication');
Route::get('/scholarship form/create', 'ScholarshipsController@createScholarship');


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

Route::group(['middleware' => 'isguest'], function(){
    Route::get('/messages/sp/{sponsor}', 'MessagesController@autofillMsgSponsor');
    Route::get('/messages/s/{studentProfile}', 'MessagesController@autofillMsgScholar');
    Route::get('/messages/read', 'MessagesController@getReadMsg');
    Route::get('/messages/unread', 'MessagesController@getUnReadMsg');
    Route::get('/messages/inbox', 'MessagesController@getAllMsg');
    Route::post('/messages/send', 'MessagesController@send');
    Route::get('/messages/thread', 'MessagesController@showThread');
    Route::get('/messages/compose', 'MessagesController@compose');
    Route::get('/messages/reply', 'MessagesController@sendreply');
    Route::get('/messages/mark', 'MessagesController@readMessage'); 
    Route::get('/messages/delete', 'MessagesController@destroy'); 
    // Route::get('/messages/mark', 'MessagesController@readMessage'); 
    // Route::get('/getlessons/{lesson_id}/{page_number}', 'LessonController@getPage');
    Route::get('/messages/sent', 'MessagesController@sentMessages');

    Route::get('/setup form', 'ProfileSetupController@viewSetupForm');
    Route::get('/setup form/register', 'ProfileSetupController@editSetup'); 
});


// APPLICATION STATUS CHANGES
Route::post('/application/avail','ApplicationController@avail');
Route::post('/application/rejectAvail','ApplicationController@rejectAvail');
Route::post('/application/accept','ApplicationController@accept');
Route::post('/application/reject', 'ApplicationController@reject');
Route::post('/scholars/remove', 'ApplicationController@remove');


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

Route::get("/profile sponsor/{sponsor_id}", function($sponsor_id){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\SponsorController)->viewSearchfromSponsor($sponsor_id);
        break;
        case 'student':
          return (new \App\Http\Controllers\SponsorController)->viewSearchfromStudent($sponsor_id);
        break;
    }
});


Route::get('/profile_sponsor/{scholarship_id}', 'SponsorController@profileCont');
Route::get('/scholarship/reopen/{scholarship_id}', 'ScholarshipsController@reopenScholarship');
//Route::get('/');

// FOR NOTIFICATIONS
Route::get("/notifications", function(){
    switch(Auth::user()->user_type){
        case 'sponsor':
          return (new \App\Http\Controllers\NotificationsController)->viewNotificationsFrSponsor();
        break;

        case 'student':
          return (new \App\Http\Controllers\NotificationsController)->viewNotifications();
        break;
    }
});

Route::get('/notif_delete', 'NotificationsController@deleteNotif');