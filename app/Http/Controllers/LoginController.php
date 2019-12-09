<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $login_user = new user;
        $username = $request -> username;
        $email = $request -> email;
        $phone = $request -> phone;
        $password = $request -> password;

        $existing_data = null;

//        Check for username or email or phone in database
        if($username != null){
            $existing_data = \App\User::where('username', $username)->first();
        }
        elseif ($email != null){
            $existing_data = \App\User::where('email', $email)->first();
        }
        elseif ($phone != null){
            $existing_data = \App\User::where('phone', $phone)->first();
        }
        else{
//            if there's no match in database (phone or email or username)
            if($existing_data == null){
                $isFailed = true;
                array_push($errors, 'This user data does not exist');
            }
        }

        if($existing_data == null){
            $isFailed = true;
            array_push($errors, 'This user data does not exist');
        }

        if ($isFailed != true){
//            get the password from database
            $existing_password = $existing_data -> password;
//            compare with the password which came in request
            if ($existing_password == $password){
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
        }


        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }
}
