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

class DoctorsController extends Controller
{
    // for mobile
    public function mobileShowAll(Request $request){
        // TO DO
        // Hash IDs

        $isFailed = false;
        $data = [];
        $errors =  [];

        // $headers = $request ->header()->all();

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }


        if ($isFailed == false){
            $city = $user -> city_id;
            $doctors = User::where('role_id', '3')->where('city_id', $city)->get();

            if($doctors == null){
                $isFailed = true;
                $errors += [
                    'doctors' => 'no available doctors in your area yet'
                ];
            }
            else{
                $doctor = [];
                foreach ($doctors as $doc){

                    $id = $doc -> id;
                    $doc2 = Doctor::where('user_id', $id)->first();
                    $spec_id = $doc2 -> speciality_id;
                    $speciality = Speciality::find($spec_id);

                    // Get the doctor's photo
                    $image_id = $doc -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }

                    // TO DO
                    // show overall rating
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
                            $appointment_rating = 0;

                            if($rating != null){
                                $behavior = $rating -> behavior;
                                $price = $rating -> price;
                                $efficiency = $rating -> efficiency;
                                $appointment_rating = ($behavior + $price + $efficiency) / 3;
                                $overall_rate += $appointment_rating;
                            }
                        }
                        $overall_rating = $overall_rate / $appointments_count;
                        $ratings = [
                            'rating' => $overall_rating
                        ];
                    }
                    else{
                        $ratings = [
                            'error' => 'no available ratings yet'
                        ];
                    }

                    // build response
                    $doctor = [
                        'id' => $doc -> id,
                        'full_name' => $doc -> full_name,
                        'speciality' => $speciality -> name,
                        'image' => $image_path,
                        'fees' => $doc2 -> fees,
                        'overall_rating' => $ratings
                    ];
                    $data[] = $doctor;
                }

            }
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
        if($isFailed == false){
            $id = $request -> id;
            // get basic information of doctor
            $doc_user = User::find($id);
            if($doc_user == null){
                $isFailed = true;
                $errors += [
                    'null' => 'can not find this doctor'
                ];
            }
            else{
                // get all informatiom about the doctor
                $doc2 = Doctor::where('user_id', $id)->first();
                // get doctor speciality name
                $spec_id = $doc2 -> speciality_id;
                $spec = Speciality::find($spec_id);
                // Get the doctor's photo
                $image_id = $doc_user -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = $image -> path;
                }
                else{
                    $image_path = null;
                }

                // Get Reviews
                $doc_id = $doc2 -> id;
                $appointments = Appointment::where('doctor_id', $doc_id)->get();
                $appointments_count = Appointment::where('doctor_id', $doc_id)->count();
                $ratings = [];
                if($appointments == null || $appointments_count == 0){
                    $ratings = [
                        'error' => 'no available ratings yet'
                    ];
                }
                else{
                    $overall_rate = 0;
                    foreach($appointments as $appointment){
                        $appointment_id = $appointment -> id;
                        $rating = DoctorRating::where('appointment_id', $appointment_id)->first();
                        $appointment_rating = 0;
                        if($rating != null){
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
                                $image_path = null;
                            }
                            $rate = [
                                'rating' => $overall_rate,
                                'full_name' => $full_name,
                                'review' => $review,
                                'image' => $image_path
                            ];
                            $ratings[] = $rate;
                        }
                    }
                }
                // Build Response

                // Basic doctor data
                $doctor = [
                    'id' => $id,
                    'full_name' => $doc_user -> full_name,
                    'speciality' => $spec -> name,
                    'image' => $image_path,
                    'qualifications' => $doc2 -> qualifications,
                    'fees' => $doc2 -> fees,
                    'offers_callup' => $doc2 -> offers_callup,
                    'callup_fees' => $doc2 -> callup_fees
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
