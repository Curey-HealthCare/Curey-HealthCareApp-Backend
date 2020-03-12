<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\City;
use App\Country;
use App\Doctor;
use App\Gender;
use App\Image;
use App\Pharmacy;
use App\Speciality;
use App\UserRole;

class LoginController extends Controller
{
    public function mobileUserLogin(Request $request){

        $isFailed = false;
        $data = [];
        $errors =  [];


        $existing_data = null;

        $validator = Validator::make($request->all(), [
                'user' => 'required|min:6|max:50',
                'password' => 'required|min:8|max:50'
            ]
        );

        if ($validator->fails()){
            $isFailed = true;
            $validator_errors = $validator -> errors();
            $errors += [
                'validator' => $validator_errors
            ];
        }

//        Check for username or email or phone in database
        if($isFailed == false){

            $existing_data = \App\User::where('email', $request -> user)->first();
            if ($existing_data == null){
                $existing_data = \App\User::where('phone', $request -> user)->first();
            }
//        if There's no user data
            if($existing_data == null){
                $isFailed = true;
                $errors += [
                    'user' => "This user data doesn't exist"
                ];
            }

            if ($isFailed != true){
//            get the password from database
                $existing_password = $existing_data -> password;
//            compare with the password which came in request
                if (Hash::check($request -> password, $existing_password)){
//                the passwords matched, get more data
                    // Generate new api token
                    $api_token = Str::random(80);
                    $existing_data -> where('id', $existing_data -> id)
                        -> update(['api_token' => $api_token]);

                    $image_id = $existing_data -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    $data = [
                        'api_token' => $api_token,
                        'full_name' => $existing_data -> full_name,
                        'image' => $image_path
                    ];

                    /*
                    if ($role_id == '1'){
                        $data = [
                            'user' => $existing_data
                        ];
                    }
                    elseif ($role_id == '2'){
                        $pharmacy = Pharmacy::where('user_id', $existing_data -> id)->first();
                        $data = [
                            'user' => $existing_data,
                            'pharmacy' => $pharmacy
                        ];
                    }
                    elseif ($role_id == '3'){
                        $doctor = Doctor::where('user_id', $existing_data -> id)->first();
                        $data = [
                            'user' => $existing_data,
                            'doctor' => $doctor
                        ];
                    }
                    */
                }
                else{
                    $errors = [
                        'password' => "The password doesn't match"
                    ];
                    $isFailed = true;
                }
            }
        }


        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }

    public function webUserLogin(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];


        $existing_data = null;

        $validator = Validator::make($request->all(), [
                'user' => 'required|min:6|max:50',
                'password' => 'required|min:8|max:50'
            ]
        );

        if ($validator->fails()){
            $isFailed = true;
            $validator_errors = $validator -> errors();
            $errors += [
                'validator' => $validator_errors
            ];
        }

//        Check for username or email or phone in database
        if($isFailed == false){

            $existing_data = \App\User::where('email', $request -> user)->first();
            if ($existing_data == null){
                $existing_data = \App\User::where('phone', $request -> user)->first();
            }
//        if There's no user data
            if($existing_data == null){
                $isFailed = true;
                $errors += [
                    'user' => "This user data doesn't exist"
                ];
            }

            if ($isFailed != true){
//            get the password from database
                $existing_password = $existing_data -> password;
//            compare with the password which came in request
                if (Hash::check($request -> password, $existing_password)){
//                the passwords matched, get more data
                    // Generate new api token
                    $api_token = Str::random(80);
                    $existing_data -> where('id', $existing_data -> id)
                        -> update(['api_token' => $api_token]);

                    $image_id = $existing_data -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    $data = [
                        'api_token' => $api_token,
                        'full_name' => $existing_data -> full_name,
                        'image' => $image_path
                    ];

                    /*
                    if ($role_id == '1'){
                        $data = [
                            'user' => $existing_data
                        ];
                    }
                    elseif ($role_id == '2'){
                        $pharmacy = Pharmacy::where('user_id', $existing_data -> id)->first();
                        $data = [
                            'user' => $existing_data,
                            'pharmacy' => $pharmacy
                        ];
                    }
                    elseif ($role_id == '3'){
                        $doctor = Doctor::where('user_id', $existing_data -> id)->first();
                        $data = [
                            'user' => $existing_data,
                            'doctor' => $doctor
                        ];
                    }
                    */
                }
                else{
                    $errors = [
                        'password' => "The password doesn't match"
                    ];
                    $isFailed = true;
                }
            }
        }


        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }
}
