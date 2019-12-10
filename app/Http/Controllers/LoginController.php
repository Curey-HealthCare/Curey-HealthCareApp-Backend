<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\user;
use App\city;
use App\country;
use App\doctor;
use App\gender;
use App\image;
use App\pharmacy;
use App\specialities;
use App\user_role;

class LoginController extends Controller
{
    public function login(Request $request){

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
            $errors = $validator -> errors();
        }

//        Check for username or email or phone in database
        $existing_data = \App\User::where('username', $request -> user)->first();

        if($existing_data == null){
            $existing_data = \App\User::where('email', $request -> user)->first();
        }
        if ($existing_data == null){
            $existing_data = \App\User::where('phone', $request -> user)->first();
        }

//        if There's no user data
        if($existing_data == null){
            $isFailed = true;
            array_push($errors, 'This user data does not exist');
        }

        if ($isFailed != true){
//            get the password from database
            $existing_password = $existing_data -> password;
//            compare with the password which came in request
            if (Hash::check($request -> password, $existing_password)){
//                the passwords matched, get more data

                $role_id = $existing_data -> role_id;

                if ($role_id == '1'){
                    array_push($data, $existing_data);
                }
                elseif ($role_id == '2'){
                    $pharmacy = pharmacy::where('user_id', $existing_data -> id)->first();
                    array_push($data, [$existing_data, $pharmacy]);
                }
                elseif ($role_id == '3'){
                    $doctor = doctor::where('user_id', $existing_data -> id)->first();
                    array_push($data, [$existing_data, $doctor]);
                }
            }
            else{
                array_push($errors, ['password does not match']);
                $isFailed = true;
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
