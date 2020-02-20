<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
// Sign up routes
Route::get('signup', 'SignupController@show');
Route::post('signup', 'SignupController@signUp');
// API token validation
Route::post('validateToken', 'SignupController@validateToken');

Route::get('completeSignup', 'SignupController@show2');
Route::post('completeSignup', 'SignupController@signup2');
// Login route
Route::post('login', 'LoginController@login');
// Route::get('mobile/{lang}', 'LocalController@local');
*/

// mobile routes
Route::group(['prefix' => '/mobile'], function(){
    // Localizaiton
    Route::get('/{lang}', 'LocalController@mobileLocal');

    // Sign up
    Route::post('/signup', 'SignupController@mobileSignUp');

    // Login
    Route::post('/login', 'LoginController@mobileLogin');

    //Token Validation
    Route::post('/validateToken', 'SignupController@mobileValidateToken');

    // Home Route
    Route::post('/', 'HomeController@mobileIndex');
});

