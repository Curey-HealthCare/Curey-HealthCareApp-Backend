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
    // Doctors Page
    Route::get('/doctors', 'DoctorsController@mobileShowAll');
    // Doctor page
    Route::get('/doctor', 'DoctorsController@mobileShowOne');
    // Search Doctors
    Route::get('/doctors/search', 'SearchController@mobileSearchDoctors');
    // Medications Page
    Route::get('/medications', 'MedicationsController@mobileShowAll');
    // product page
    Route::get('/medication', 'MedicationsController@mobileShowOne');
    // Search Products
    Route::get('/medications/search', 'SearchController@mobileSearchProducts');
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
    //show appointment page
    Route::get('/appointments', 'AppointmentsController@mobileAppShowAll');
    // book and appointment
    Route::get('/book_appointment', 'AppointmentsController@mobileShowAvailable');
    Route::post('/book_appointment', 'AppointmentsController@mobileCreateAppointment');
    //prescription
    Route::get('/prescriptions', 'PrescriptionController@mobilePresShowAll');
    // Create Prescription
    Route::post('/add_prescription', 'PrescriptionController@mobileCreatePrescription');
    //delete prescription
    Route::post('/delete_prescription', 'PrescriptionController@mobileDeletePrescription');
    // Show All Favourites
    Route::get('/favourites', 'FavouritesController@mobileShowFavourites');
    // Add to favourites
    Route::post('/add_favourites', 'FavouritesController@mobileAddFavourite');
    // Remove from favourites
    Route::post('/delete_favourites', 'FavouritesController@mobileDeleteFavourite');
    // *********************************************************** //
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
    // *********************************************************** //
//    Medical Wallet
//    radiology
    Route::post('/upload_radiology', 'MedicalWalletController@webSaveRadiology');
    Route::get('/radiology', 'MedicalWalletController@webReadRadiology');
    Route::post('/remove_radiology', 'MedicalWalletController@webDeleteRadiology');
//    written prescriptions images
    Route::post('/upload_prescription', 'MedicalWalletController@webSavePrescription');
    Route::get('/my_prescriptions', 'MedicalWalletController@webReadPrescriptions');
    Route::post('/remove_prescription', 'MedicalWalletController@webDeletePrescription');
//    profile
    Route::get('/profile', 'ProfileController@webGetData');
    Route::post('/change_name', 'ProfileController@webChangeName');
    Route::post('/change_image', 'ProfileController@webChangeImage');
    Route::post('/change_address', 'ProfileController@webChangeAddress');
    Route::post('/change_email', 'ProfileController@webChangeEmail');
    Route::post('/change_password', 'ProfileController@webChangePassword');
    Route::post('/change_phone', 'ProfileController@webChangePhone');
//    doctor profile
    Route::post('/change_speciality', 'ProfileController@webChangeSpeciality');
    Route::post('/change_fees', 'ProfileController@webUpdateFees');
    Route::post('/change_hv', 'ProfileController@webChangeHomeVisit');
    Route::post('/change_duration', 'ProfileController@webUpdateDuration');
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
     // Show All Favourites
    Route::get('/favourites', 'FavouritesController@webShowFavourites');
     // Add to favourites
    Route::post('/add_favourites', 'FavouritesController@webAddFavourite');
     // Remove from favourites
    Route::post('/delete_favourites', 'FavouritesController@webDeleteFavourite');
    //prescription
    Route::get('/prescriptions', 'PrescriptionController@webPresShowAll');
     // Create Prescription
    Route::post('/add_prescription', 'PrescriptionController@webCreatePrescription');
     //delete prescription
    Route::post('/delete_prescription', 'PrescriptionController@webDeletePrescription');
     //show appointment page
    Route::get('/appointments', 'AppointmentsController@webShowAll');
     // book and appointment
    Route::get('/book_appointment', 'AppointmentsController@webShowAvailable');
    Route::post('/book_appointment', 'AppointmentsController@webCreateAppointment');
     // Doctors Page
    Route::get('/doctors', 'DoctorsController@webShowAll');
     // Doctor page
    Route::get('/doctor', 'DoctorsController@webShowOne');
     // Search Doctors
    Route::get('/doctors/search', 'SearchController@webSearchDoctors');
     // Medications Page
    Route::get('/medications', 'MedicationsController@webShowAll');
     // product page
    Route::get('/medication', 'MedicationsController@webShowOne');
     // Search Products
    Route::get('/medications/search', 'SearchController@webSearchProducts');
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
    // *********************************************************** //
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
    // *********************************************************** //
//    Medical Wallet
//    radiology
    Route::post('/upload_radiology', 'MedicalWalletController@webSaveRadiology');
    Route::get('/radiology', 'MedicalWalletController@webReadRadiology');
    Route::post('/remove_radiology', 'MedicalWalletController@webDeleteRadiology');
//    written prescriptions images
    Route::post('/upload_prescription', 'MedicalWalletController@webSavePrescription');
    Route::get('/my_prescriptions', 'MedicalWalletController@webReadPrescriptions');
    Route::post('/remove_prescription', 'MedicalWalletController@webDeletePrescription');
//    profile
    Route::get('/profile', 'ProfileController@webGetData');
    Route::post('/change_name', 'ProfileController@webChangeName');
    Route::post('/change_image', 'ProfileController@webChangeImage');
    Route::post('/change_address', 'ProfileController@webChangeAddress');
    Route::post('/change_email', 'ProfileController@webChangeEmail');
    Route::post('/change_password', 'ProfileController@webChangePassword');
    Route::post('/change_phone', 'ProfileController@webChangePhone');
//    doctor profile
    Route::post('/change_speciality', 'ProfileController@webChangeSpeciality');
    Route::post('/change_fees', 'ProfileController@webUpdateFees');
    Route::post('/change_hv', 'ProfileController@webChangeHomeVisit');
    Route::post('/change_duration', 'ProfileController@webUpdateDuration');
});
