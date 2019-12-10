<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use http\Client\Response;
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

class SignupController extends Controller
{
    public function show(){
        $user_roles = user_role::all();

        $data = [
            'user_roles' => $user_roles
        ];

        $response = ['isFailed' => false,
            'data' => $data,
            'errors' => null];

        return response()->json($response, 200);
    }

    public function signUp(Request $request){
        $role = $request -> role_id;
        $email = $request -> email;
        $username = $request -> username;

        $isFailed = false;
        $data = [];
        $errors =  [];

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:6|max:50',
            'email' => 'required|max:50',
            'password' => 'required|min:8|max:50',
            'confirm_password' => 'required|min:8|max:50'
        ]);


//        Check existing records in database for conflicts
        $all_users = user::all();

        foreach ($all_users as $user){
            if ($user -> email == $email and $user -> role_id == $role){
//                Add error that this email is already in database with same user role
                array_push($errors, 'This email is already signed up with the same user type');
                $isFailed = true;
            }
            if ($user -> username == $username){
//                Add error that this username is used
                array_push($errors, 'This username is already used');
                $isFailed = true;
            }
        }

        if($isFailed == false){
            if($role == '1'){
//                sign up as customer
                $new_user = new user;
                $new_user -> username = $request -> username;
                $new_user -> email = $request -> email;
                $new_user -> role_id = $request -> role_id;
                $new_user -> password = $request -> password;

                $new_user -> save();
                array_push($data, $new_user);
            }
            elseif ($role == '2'){
//                 sign up as pharmacy, need to make the user first then get the user id for pharmacies table
                $new_ph = new user;
                $new_ph -> username = $request -> username;
                $new_ph -> email = $request -> email;
                $new_ph -> role_id = $request -> role_id;
                $new_ph -> password = $request -> password;

                $new_ph -> save();

                $pharmacy = new pharmacy;
                $pharmacy -> user_id = $new_ph -> id;

                $pharmacy -> save();

                array_push($data, [$new_ph, $pharmacy]);
            }
            elseif ($role == '3'){
//             sign up as doctor, need to make the user first then get the user id for doctors table
                $new_dr = new user;
                $new_dr -> username = $request -> username;
                $new_dr -> email = $request -> email;
                $new_dr -> role_id = $request -> role_id;
                $new_dr -> password = $request -> password;

                $new_dr -> save();

                $doctor = new doctor;
                $doctor -> user_id = $new_dr -> id;

                $doctor -> save();

                array_push($data, [$new_dr, $doctor]);
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

