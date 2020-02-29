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
    Route::get('/{lang}/{app}', 'LocalController@mobileUserLocal');

    // Sign up
    Route::post('/signup', 'SignupController@mobileSignUp');
    Route::get('/signup', 'SignupController@show');

    // Login
    Route::post('/userLogin', 'LoginController@mobileUserLogin');

    // Home Route
    Route::post('/', 'HomeController@mobileIndex');

    // Doctors Page
    Route::get('/doctors', 'DoctorsController@mobileShowAll');
    // Doctor page
    Route::get('/doctor', 'DoctorsController@mobileShowOne');
    // Search Products
    Route::get('/doctors_search', 'SearchController@mobileSearchDoctors');

    // Medications Page
    Route::get('/medications', 'MedicationsController@mobileShowAll');
    // product page
    Route::get('/medication', 'MedicationsController@mobileShowOne');
    // Search Products
    Route::get('/medications_search', 'SearchController@mobileSearchProducts');


    //show order page
    Route::post('/orders', 'OrderController@mobileShowOrder');
    //show appointment page
    Route::get('/appointments', 'AppointmentsController@mobileAppShowAll');

});

