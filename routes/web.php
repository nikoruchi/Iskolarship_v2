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
});

Route::get('/registration/Student Form', function () {
    return view('registration/scholar_form');
}); 

Route::get('/registration/Sponsor Form', function () {
    return view('registration/sponsor_form');
});

Route::post('/registration/Student', 'ScholarAuthController@Validation');

Route::post('/registration/Sponsor', 'SponsorAuthController@Validation');

Auth::routes();

// Route::get('/home', 'HomeController@index');


// -----------------------CHECKERS-----------------------
// This will be change as soon as auth and middleware is added

Route::get('/home', function () {
    return view('home');
});

Route::get('/Search Results', function () {
    return view('search_results');
});

Route::get('/profile scholar', function () {
    return view('profiles/profile_scholar');
});

Route::get('/profile scholarship', function () {
    return view('profiles/profile_scholarship');
});


