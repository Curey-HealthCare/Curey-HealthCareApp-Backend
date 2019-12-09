<?php

namespace App\Http\Controllers;

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
        $countries = country::all();
        $cities = city::all();
        $genders = gender::all();
        $specialities = specialities::all();
        $user_roles = user_role::all();

        $data = ['countries' => $countries,
            'cities' => $cities,
            'genders' => $genders,
            'specialities' => $specialities,
            'user_roles' => $user_roles];

        $response = ['isFailed' => false,
            'data' => $data,
            'errors' => null];

        return response()->json($response, 200);
    }

    public function signUp(Request $request){
        $role = $request['user_role'];
        $email = $request['email'];
        $username = $request['username'];
        $phone = $request['phone'];

        $isFailed = false;
        $data = [];
        $errors =  [];

//        Check existing records in database for conflicts
        $all_users = user::all();

        foreach ($all_users as $user){
            if ($user['email'] = $email and $user['role_id'] = $role){
//                Add error that this email is already in database with same user role
                array_push($errors, 'This email is already signed up with the same user type');
                $isFailed = true;
            }
            if ($user['username'] = $username){
//                Add error that this username is used
                array_push($errors, 'This username is already used');
                $isFailed = true;
            }
            if ($user['phone'] = $phone){
//                Add error that this phone number is used
                array_push($errors, 'This phone number is already used');
                $isFailed = true;
            }
        }

        if($isFailed){
            if($role = '1'){
//             sign up as customer
            }
            elseif ($role = '2'){
//             sign up as pharmacy, need to make the user first then get the user id for pharmacies table
            }
            elseif ($role = '3'){
//             sign up as doctor, need to make the user first then get the user id for doctors table
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

