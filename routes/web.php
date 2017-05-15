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

Route::get('/profile scholar/{student_id}', ['middleware'=>'isguest','uses'=>'ProfileController@profile']);

Route::get('/profile scholar', 'ProfileController@profileStudent');

// Route::get('/home', ['middleware'=>'student','uses'=>'HomeController@homeStudent']);

	
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

// Route::get('/home', ['middleware'=>'sponsor','uses'=>'HomeController@homeSponsor']);
	
// Route::get('/home', 'HomeController@homeStudent');

Route::get('/Search Results', function () {
    return view('search_results');
});

Route::get('/profile scholarship/{scholarship_id}', 'ProfileController@homeSponsor');


//=============== FOR FRONT-END PURPOSES =======================
// Route::get('/messages', ['middleware'=>'isguest','uses'=>'MessageController@index']);

Route::get('/search', function () {
    return view('user/search');
});
