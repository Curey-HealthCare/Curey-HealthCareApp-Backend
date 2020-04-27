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
    Route::get('/locale/{lang}/{app}', 'LocalController@mobileUserLocal');

    // Sign up
    Route::post('/signup', 'SignupController@mobileSignUp');
    Route::get('/signup', 'SignupController@show');

    // Login
    Route::post('/login', 'LoginController@mobileLogin');
    // Logout
    Route::post('/logout', 'LoginController@logout');

    // Forget Password
    Route::post('/forget_password', 'ForgetPasswordController@getEmail');
    Route::post('/update_password', 'ForgetPasswordController@updatePassword');


    // Home Route
    Route::get('/home', 'HomeController@mobileIndex');

                   //Doctor in mobile
    // Doctors Page
    Route::get('/doctors', 'DoctorsController@mobileShowAll');
    // Doctor page
    Route::get('/doctor', 'DoctorsController@mobileShowOne');
    // Search Doctors
    Route::get('/doctors/search', 'SearchController@mobileSearchDoctors');

                     //Medications for mobile
    // Medications Page
    Route::get('/medications', 'MedicationsController@mobileShowAll');
    // product page
    Route::get('/medication', 'MedicationsController@mobileShowOne');
    // Search Products
    Route::get('/medications/search', 'SearchController@mobileSearchProducts');

                        //order for mobile
    //show orders page
    Route::get('/orders', 'OrdersController@mobileShowOrders');
    Route::post('/submit_order', 'OrdersController@mobileSubmit');
    // cancel order
    Route::post('/cancel_order', 'OrdersController@mobileCancelOrder');
                        // Cart functionailty
    Route::post('/add_item', 'CartController@mobileCreate');
    Route::post('/update_item', 'CartController@mobileUpdate');
    Route::post('/delete_item', 'CartController@mobileDelete');
    Route::get('/cart', 'CartController@mobileRead');
                     // Appointments for mobile
    //show appointment page
    Route::get('/appointments', 'AppointmentsController@mobileAppShowAll');
    // book and appointment
    Route::get('/book_appointment', 'AppointmentsController@mobileShowAvailable');
    Route::post('/book_appointment', 'AppointmentsController@mobileCreateAppointment');

                     //prescription for mobile
    Route::get('/prescriptions', 'PrescriptionController@mobilePresShowAll');
    // Create Prescription
    Route::post('/add_prescription', 'PrescriptionController@mobileCreatePrescription');
    //delete prescription
    Route::post('/delete_prescription', 'PrescriptionController@mobileDeletePrescription');

                        // Favourites for mobile
    // Show All Favourites
    Route::get('/favourites', 'FavouritesController@mobileShowFavourites');
    // Add to favourites
    Route::post('/add_favourites', 'FavouritesController@mobileAddFavourite');
    // Remove from favourites
    Route::post('/delete_favourites', 'FavouritesController@mobileDeleteFavourite');

});

Route::group(['middleware' => ['cors'],'prefix' => '/web'], function(){

    // Signup
    Route::post('/signup', 'SignupController@webSignup');
    Route::get('/signup', 'SignupController@show');

    // User Login
    Route::post('/login', 'LoginController@webLogin');
    // Logout
    Route::post('/logout', 'LoginController@logout');

    // Forget Password
    Route::post('/forget_password', 'ForgetPasswordController@getEmail');
    Route::post('/update_password', 'ForgetPasswordController@updatePassword');

     // Home Page
    Route::get('/home', 'HomeController@webHome');

                      // Favourites for web
     // Show All Favourites
    Route::get('/favourites', 'FavouritesController@webShowFavourites');
     // Add to favourites
    Route::post('/add_favourites', 'FavouritesController@webAddFavourite');
     // Remove from favourites
    Route::post('/delete_favourites', 'FavouritesController@webDeleteFavourite');

                      //prescription for web
    Route::get('/prescriptions', 'PrescriptionController@webPresShowAll');
     // Create Prescription
    Route::post('/add_prescription', 'PrescriptionController@webCreatePrescription');
     //delete prescription
    Route::post('/delete_prescription', 'PrescriptionController@webDeletePrescription');

                       //Appointments for web
     //show appointment page
    Route::get('/appointments', 'AppointmentsController@webShowAll');
     // book and appointment
    Route::get('/book_appointment', 'AppointmentsController@webShowAvailable');
    Route::post('/book_appointment', 'AppointmentsController@webCreateAppointment');

                        //Doctor for web
     // Doctors Page
    Route::get('/doctors', 'DoctorsController@webShowAll');
     // Doctor page
    Route::get('/doctor', 'DoctorsController@webShowOne');
     // Search Doctors
    Route::get('/doctors/search', 'SearchController@webSearchDoctors');

                        //Medications for web
     // Medications Page
    Route::get('/medications', 'MedicationsController@webShowAll');
     // product page
    Route::get('/medication', 'MedicationsController@webShowOne');
     // Search Products
    Route::get('/medications/search', 'SearchController@webSearchProducts');
                           //order for mobile
    //show orders page
    Route::get('/orders', 'OrdersController@webShowOrders');
    // Submit order
    Route::post('/submit_order', 'OrdersController@webSubmit');
    // cancel order
    Route::post('/cancel_order', 'OrdersController@webCancelOrder');

                        // Cart functionailty
    Route::post('/add_item', 'CartController@mobileCreate');
    Route::post('/update_item', 'CartController@mobileUpdate');
    Route::post('/delete_item', 'CartController@mobileDelete');
    Route::get('/cart', 'CartController@mobileRead');
                      //pharmacy dashboard for web
     // pharmacy dashboard Page
    Route::get('/pharmacy_dashboard', 'PharmaciesController@WebPharmacyDashboard');
     //medication list
    Route::get('/stock', 'PharmaciesController@webStock');
    //requests
    Route::get('/requests', 'PharmaciesController@webRequests');
    Route::post('/accept_request', 'PharmaciesController@webAcceptRequest');

    // packing list
    Route::get('/packing_list', 'PharmaciesController@webPackingList');
    Route::post('/order_ready', 'PharmaciesController@webOrderReady');

    // *********************************************************** //
    // doctor Dashboard
    Route::get('/doctor_dashboard', 'DoctorDashboardController@webDashboard');

    // doctor schedule
    Route::post('/add_schedule', 'ScheduleController@webCreate');
    Route::get('/schedule', 'ScheduleController@webRead');
    Route::post('/update_day', 'ScheduleController@webUpdate');
    Route::post('/delete_day', 'ScheduleController@webDelete');

    // home visit status
    Route::post('/homevisit_status', 'ScheduleController@webHomeVisitStatus');

    // doctor appointments
    Route::get('/doctor/requests', 'DoctorAppointmentsController@webReadRequests');
    Route::get('/doctor/reExaminations', 'DoctorAppointmentsController@webReadReExamination');
    Route::post('/doctor/set_reExamination', 'DoctorAppointmentsController@webSetReExamination');

    // doctor prescriptions
    Route::get('/doctor/prescriptions', 'DoctorPrescriptionsController@webReadAll');
    Route::post('/doctor/send_prescription', 'DoctorPrescriptionsController@webCreate');


//    Medical Wallet
    Route::post('/upload_radiology', 'MedicalWalletController@webSaveRadiology');
    Route::get('/radiology', 'MedicalWalletController@webReadRadiology');
});
