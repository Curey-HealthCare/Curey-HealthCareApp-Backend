<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\City;
use App\Doctor;
use App\Gender;
use App\Image;
use App\Speciality;
use App\UserRole;
use App\DoctorRating;
use App\Appointment;
use App\Degree;

class DoctorsController extends Controller
{
    // for mobile
    public function mobileShowAll(Request $request){


        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $skip = $request -> skip;
            $limit = $request -> limit;
            $city = $user -> city_id;
            $doctors = User::where('role_id', '3')->skip($skip)->take($limit)->get();

            if($doctors == null){
                $isFailed = true;
                $errors += [
                    'doctors' => 'no available doctors'
                ];
            }
            else{
                $doctors_response = [];
                foreach ($doctors as $doc){
                    $id = $doc -> id;
                    $doc2 = Doctor::where('user_id', $id)->first();
                    // if the doctor's profile isn't complete skip this doctor
                    if($doc -> city_id == null){
                        continue;
                    }
                    if($doc2 -> speciality_id == null){
                        continue;
                    }
                    $spec_id = $doc2 -> speciality_id;
                    $speciality = Speciality::find($spec_id);
                    // Get the doctor's photo
                    $image_id = $doc -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = "default/doctor.png";
                    }

                    $doc_id = $doc2 -> id;
                    $appointments = Appointment::where('doctor_id', $doc_id)->get();
                    $appointments_count = Appointment::where('doctor_id', $doc_id)->count();
                    $overall_rating = 0;
                    if($appointments != null && $appointments_count != 0){
                        $overall_rate = 0;
                        foreach($appointments as $appointment){
                            $appointment_id = $appointment -> id;
                            $rating = DoctorRating::where('appointment_id', $appointment_id)->first();

                            if($rating != null){
                                $behavior = $rating -> behavior;
                                $price = $rating -> price;
                                $efficiency = $rating -> efficiency;
                                $appointment_rating = ($behavior + $price + $efficiency) / 3;
                                $overall_rate += $appointment_rating;
                            }
                        }
                        if ($appointments_count != 0) {
                            $overall_rating = $overall_rate / $appointments_count;
                        }
                    }
                    else{
                        $overall_rating = 0;
                    }

                    // build response
                    $doctor = [
                        'id' => $doc2 -> id,
                        'full_name' => $doc -> full_name,
                        'speciality' => $speciality -> name,
                        'image' => $image_path,
                        'city_id' => $doc -> city_id,
                        'offers_callup' => $doc2 -> offers_callup,
                        'fees' => $doc2 -> fees,
                        'overall_rating' => $overall_rating
                    ];
                    $doctors_response[] = $doctor;
                }

            }
            $specialities = Speciality::all();
            $specs = [];
            foreach($specialities as $spec){
                $specs[] = [
                    'id' => $spec -> id,
                    'name' => $spec -> name,
                ];
            }
            $cities_data = City::all();
            $cities = [];
            foreach($cities_data as $city){
                $cities[] = [
                    'id' => $city -> id,
                    'name' => $city -> name,
                ];
            }
            $data = [
                'doctors' => $doctors_response,
                'specialities' => $specs,
                'cities' => $cities,
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function mobileShowOne(Request $request){
        // TO DO
        // Hash IDs
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();
        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $id = $request -> id;
            // get basic information of doctor
            $doc = Doctor::where('id', $id)->first();
            if($doc == null){
                $isFailed = true;
                $errors += [
                    'doctor' => 'can not find this doctor'
                ];
            }
            else{
                // get all informatiom about the doctor
                $doc_user = User::where('id', $doc -> user_id)->first();
                // get doctor speciality name
                $spec_id = $doc -> speciality_id;
                $spec = Speciality::find($spec_id);
                // Get the doctor's photo
                $image_id = $doc_user -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = $image -> path;
                }
                else{
                    $image_path = "default/doctor.png";
                }

                // Get Reviews
                $appointments = Appointment::where('doctor_id', $id)->get();
                $appointments_count = Appointment::where('doctor_id', $id)->count();
                $ratings = [];
                $overall_rating = 0;
                if($appointments == null || $appointments_count == 0){
                    $ratings = [];
                }
                else{
                    $overall_rate = 0;
                    foreach($appointments as $appointment){
                        $appointment_id = $appointment -> id;
                        $rating = DoctorRating::where('appointment_id', $appointment_id)->first();
                        // $appointment_rating = 0;
                        if($rating == null){
                            continue;
                        }
                        else{
                            $behavior = $rating -> behavior;
                            $price = $rating -> price;
                            $efficiency = $rating -> efficiency;
                            $appointment_rating = ($behavior + $price + $efficiency) / 3;
                            $overall_rate += $appointment_rating;

                            $review = $rating -> review;

                            // Get the user who wrote the review
                            $user_id = $appointment -> user_id;
                            $user = User::where('id', $user_id)->first();
                            $full_name = $user -> full_name;
                            $image_id = $user -> image_id;
                            $image = Image::where('id', $image_id)->first();
                            if($image != null){
                                $image_path = $image -> path;
                            }
                            else{
                                $image_path = "default/user.png";
                            }
                            $rate = [
                                'rating' => $appointment_rating,
                                'full_name' => $full_name,
                                'review' => $review,
                                'image' => $image_path
                            ];
                            $ratings[] = $rate;
                        }
                    }
                    if ($appointments_count != 0){
                        $overall_rating = $overall_rate / $appointments_count;
                    }
                }
                // Get doctor degrees
                $degrees = Degree::where('doctor_id', $doc -> id)->get();
                $degrees_response = [];
                if($degrees -> isEmpty()){
                    $degrees_response = [];
                }
                else{
                    foreach($degrees as $degree){
                        $degrees_response[] = [
                            'name' => $degree -> name,
                        ];
                    }
                }
                // Build Response

                // Basic doctor data
                $doctor = [
                    'id' => $id,
                    'full_name' => $doc_user -> full_name,
                    'speciality' => $spec -> name,
                    'image' => $image_path,
                    'qualifications' => $doc -> qualifications,
                    'fees' => $doc -> fees,
                    'offers_callup' => $doc -> offers_callup,
                    'callup_fees' => $doc -> callup_fees,
                    'address' => $doc -> address,
                    'mobile' => $doc_user -> phone,
                    'email' => $doc_user -> email,
                    'overall_rating' => $overall_rating,
                    'degrees' => $degrees_response // remember to send degrees
                ];


                $data += [
                    'doctor' => $doctor,
                    'reviews' => $ratings
                ];
            }
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }


    /* Web Tailored Functions */
    /* ***************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    */

    //for web
    public function webShowAll(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $skip = $request -> skip;
            $limit  =$request -> limit;
            $city = $user -> city_id;
            $doctors = User::where('role_id', '3')->skip($skip)->take($limit)->get();

            if($doctors == null){
                $isFailed = true;
                $errors += [
                    'doctors' => 'no available doctors'
                ];
            }
            else{
                $doctor = [];
                $doctors_response = [];
                foreach ($doctors as $doc){

                    $id = $doc -> id;
                    $doc2 = Doctor::where('user_id', $id)->first();
                    // if the doctor's profile isn't complete skip this doctor
                    if($doc -> city_id == null){
                        continue;
                    }
                    if($doc2 -> speciality_id == null){
                        continue;
                    }
                    $spec_id = $doc2 -> speciality_id;
                    $speciality = Speciality::find($spec_id);

                    // Get the doctor's photo
                    $image_id = $doc -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = "default/doctor.png";
                    }
                    $doc_id = $doc2 -> id;
                    $appointments = Appointment::where('doctor_id', $doc_id)->get();
                    $appointments_count = Appointment::where('doctor_id', $doc_id)->count();
                    $ratings = [];
                    $overall_rating = 0;
                    if($appointments != null && $appointments_count != 0){
                        $overall_rate = 0;
                        foreach($appointments as $appointment){
                            $appointment_id = $appointment -> id;
                            $rating = DoctorRating::where('appointment_id', $appointment_id)->first();

                            if($rating != null){
                                $behavior = $rating -> behavior;
                                $price = $rating -> price;
                                $efficiency = $rating -> efficiency;
                                $appointment_rating = ($behavior + $price + $efficiency) / 3;
                                $overall_rate += $appointment_rating;
                            }
                        }
                        if ($appointments_count != 0) {
                            $overall_rating = $overall_rate / $appointments_count;
                        }
                    }
                    else{
                        $overall_rating = 0;
                    }

                    // build response
                    $doctor = [
                        'id' => $doc2 -> id,
                        'full_name' => $doc -> full_name,
                        'speciality' => $speciality -> name,
                        'image' => $image_path,
                        'city_id' => $doc -> city_id,
                        'offers_callup' => $doc2 -> offers_callup,
                        'fees' => $doc2 -> fees,
                        'overall_rating' => $overall_rating
                    ];
                    $doctors_response[] = $doctor;
                }

            }
            $specialities = Speciality::all();
            $specs = [];
            foreach($specialities as $spec){
                $specs[] = [
                    'id' => $spec -> id,
                    'name' => $spec -> name,
                ];
            }
            $cities_data = City::all();
            $cities = [];
            foreach($cities_data as $city){
                $cities[] = [
                    'id' => $city -> id,
                    'name' => $city -> name,
                ];
            }
            $data = [
                'doctors' => $doctors_response,
                'specialities' => $specs,
                'cities' => $cities,
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webShowOne(Request $request){
        // TO DO
        // Hash IDs
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();
        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $id = $request -> id;
            $overall_rating = 0;
            // get basic information of doctor
            $doc = Doctor::where('id', $id)->first();
            if($doc == null){
                $isFailed = true;
                $errors += [
                    'null' => 'can not find this doctor'
                ];
            }
            else{
                // get all informatiom about the doctor
                $doc_user = User::where('id', $doc -> user_id)->first();
                // get doctor speciality name
                $spec_id = $doc -> speciality_id;
                $spec = Speciality::find($spec_id);
                // Get the doctor's photo
                $image_id = $doc_user -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = $image -> path;
                }
                else{
                    $image_path = "default/doctor.png";
                }

                // Get Reviews
                $appointments = Appointment::where('doctor_id', $id)->get();
                $appointments_count = Appointment::where('doctor_id', $id)->count();

                $clinic_count = Appointment::where('doctor_id', $id)->where('is_callup', '0')->count();
                $callup_count = Appointment::where('doctor_id', $id)->where('is_callup', '1')->count();
                $ratings = [];
                $overall_rating = 0;
                if($appointments == null && $appointments_count == 0){
                    $ratings = [];
                }
                else{
                    $review_count = 0;
                    $overall_rate = 0;
                    $noOfCallup = 0;
                    $noOfBooking  = 0;
                    foreach($appointments as $appointment){
                        $appointment_id = $appointment -> id;
                        $rating = DoctorRating::where('appointment_id', $appointment_id)->first();
                        if($rating == null){
                            continue;
                        }
                        else{
                            $behavior = $rating -> behavior;
                            $price = $rating -> price;
                            $efficiency = $rating -> efficiency;
                            $appointment_rating = ($behavior + $price + $efficiency) / 3;
                            $overall_rate += $appointment_rating;
                            $review = $rating -> review;
                            //no of reviews
                            $review_count += DoctorRating::where('appointment_id', $appointment_id)->count();


                            // Get the user who wrote the review
                            $user_id = $appointment -> user_id;
                            $user = User::where('id', $user_id)->first();
                            $full_name = $user -> full_name;
                            $image_id = $user -> image_id;
                            $image = Image::where('id', $image_id)->first();
                            if($image != null){
                                $image_path = $image -> path;
                            }
                            else{
                                $image_path = "default/user.png";
                            }
                            $rate = [
                                'rating' => $appointment_rating,
                                'full_name' => $full_name,
                                'review' => $review,
                                'image' => $image_path
                            ];
                            $ratings[] = $rate;
                        }
                    }
                    if ($appointments_count != 0){
                        $overall_rating = $overall_rate / $appointments_count;
                        $noOfBooking = $appointments_count - $noOfCallup ;
                    }
                }

                // Get doctor degrees
                $degrees = Degree::where('doctor_id', $doc -> id)->get();
                $degrees_response = [];
                if($degrees -> isEmpty()){
                    $degrees_response = [];
                }
                else{
                    foreach($degrees as $degree){
                        $degrees_response[] = [
                            'name' => $degree -> name,
                        ];
                    }
                }
                // Build Response

                // Basic doctor data
                $doctor = [
                    'id' => $id,
                    'full_name' => $doc_user -> full_name,
                    'speciality' => $spec -> name,
                    'image' => $image_path,
                    'qualifications' => $doc -> qualifications,
                    'fees' => $doc -> fees,
                    'offers_callup' => $doc -> offers_callup,
                    'callup_fees' => $doc -> callup_fees,
                    'address' => $doc -> address,
                    'mobile' => $doc_user -> phone,
                    'email' => $doc_user -> email,
                    'overall_rating' => $overall_rating,
                    'degrees' => $degrees_response,
                    'review_count' => $review_count,
                    'appointments_count' => $clinic_count,
                    'callup_count'=> $callup_count,
                ];


                $data += [
                    'doctor' => $doctor,
                    'reviews' => $ratings
                ];
            }
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
}
