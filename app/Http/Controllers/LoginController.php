<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    public function mobileLogin(Request $request){

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
            if($validator -> errors() -> first('user') != []){
                $errors += [
                    'user' => 'the user field must be at least 6 characters',
                ];
            }
            if($validator_errors -> first('password') != []){
                $errors += [
                    'password' => 'the password field must be at least 8 characters'
                ];
            }
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
                    $image_path = null;
                    if($image != null){
                        $image_path = Storage::url($image -> path . '.' .$image -> extension);
                        $image_url = asset($image_path);
                    }
                    else{
                        if($existing_data -> role_id == 1){
                            $image_url = asset(Storage::url('default/user.png'));
                        }
                        elseif($existing_data -> role_id == 2){
                            $image_url = asset(Storage::url('default/pharmacy.png'));
                        }
                        elseif($existing_data -> role_id == 3){
                            $image_url = asset(Storage::url('default/doctor.png'));
                        }
                    }
                    $data = [
                        'api_token' => $api_token,
                        'full_name' => $existing_data -> full_name,
                        'image' => $image_url,
                        'role' => $existing_data -> role_id,
                        'is_complete' => $existing_data -> is_complete,
                    ];
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

    public function webLogin(Request $request){
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
            if($validator -> errors() -> first('user') != []){
                $errors += [
                    'user' => 'the user field must be at least 6 characters',
                ];
            }
            if($validator_errors -> first('password') != []){
                $errors += [
                    'password' => 'the password field must be at least 8 characters'
                ];
            }

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
                    $image_path = null;
                    if($image != null){
                        $image_path = Storage::url($image -> path . '.' .$image -> extension);
                        $image_url = asset($image_path);
                    }
                    else{
                        if($existing_data -> role_id == 1){
                            $image_url = asset(Storage::url('default/user.png'));
                        }
                        elseif($existing_data -> role_id == 2){
                            $image_url = asset(Storage::url('default/pharmacy.png'));
                        }
                        elseif($existing_data -> role_id == 3){
                            $image_url = asset(Storage::url('default/doctor.png'));
                        }
                    }
                    $data = [
                        'api_token' => $api_token,
                        'full_name' => $existing_data -> full_name,
                        'image' => $image_url,
                        'email' => $existing_data -> email,
                        'role' => $existing_data -> role_id,
                        'is_complete' => $existing_data -> is_complete,
                    ];
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

    public function logout(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $user = User::where('api_token', $request -> api_token)->first();

        if ($user === NULL){
            $isFailed = true;
            $errors += [
                'api_token' => 'this token does not match'
            ];
        }
        else{
            User::where('id', $user -> id)
                        -> update(['api_token' => Str::random(80)]);
            $data = [
                'success' => 'user logged out'
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }
}
