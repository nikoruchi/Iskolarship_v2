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



Route::get('/profile scholar', 'ProfileController@profileStudent');


// Route::get('/home', ['middleware']=>'sponsor','uses'=>'HomeController@homeSponsor']);

// Route::get('/home', 'HomeController@homeGuests');


	
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


// Route::get('/profile scholarship/{scholarship_id}', 'ProfileController@homeSponsor');

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

Route::get('/profile sponsor', function () {
    return view('user/sponsor_profile');
});

//=============== END FOR FRONT-END PURPOSES =======================


Route::get('/Account Settings', 'EditProfileController@show');
Route::post('/Update Profile', 'EditProfileController@updateScholar');


// MESSAGES
Route::get('/messages', ['middleware'=>'isguest','uses'=>'MessagesController@index']);

Route::get('/messages/read', ['middleware'=>'isguest','uses'=>'MessagesController@getReadMsg']);

Route::get('/messages/unread', ['middleware'=>'isguest','uses'=>'MessagesController@getUnReadMsg']);

Route::get('/messages/inbox', ['middleware'=>'isguest','uses'=>'MessagesController@getAllMsg']);

Route::post('/messages/send', ['middleware'=>'isguest','uses'=>'MessagesController@send']);

Route::get('/messages/thread',['middleware'=>'isgues','uses'=>'MessagesController@showThread']);

