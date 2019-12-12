<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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

//    Removed
/*
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
*/
//    End of Removed

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
        ]);

        if ($validator->fails()){
            $isFailed = true;
            $validator_errors = $validator -> errors();
            $errors += [
                'validator' => $validator_errors
            ];
        }


//        Check existing records in database for conflicts
        $all_users = user::all();

        foreach ($all_users as $user){
            if ($user -> email == $email and $user -> role_id == $role){
//                Add error that this email is already in database with same user role
                $errors += [
                    'email' => 'This email address is already in use'
                ];
                $isFailed = true;
            }
            if ($user -> username == $username){
//                Add error that this username is used
                $errors += [
                    'username' => 'this username is already in use'
                ];
                $isFailed = true;
            }
        }

        if($isFailed == false){

//            Generate api_token

            $api_token = Str::random(80);
            if($role == '1'){
//                sign up as customer
                $new_user = new user;
                $new_user -> username = $request -> username;
                $new_user -> email = $request -> email;
                $new_user -> role_id = $request -> role_id;
                $new_user -> api_token = $api_token;

                $hashed = Hash::make($request -> password);
                $new_user -> password = $hashed;

                $new_user -> save();
                $data = [
                    'user' => $new_user
                ];
            }
            elseif ($role == '2'){
//                 sign up as pharmacy, need to make the user first then get the user id for pharmacies table
                $new_ph = new user;
                $new_ph -> username = $request -> username;
                $new_ph -> email = $request -> email;
                $new_ph -> role_id = $request -> role_id;
                $new_ph -> api_token = $api_token;

                $hashed = Hash::make($request -> password);
                $new_ph -> password = $hashed;

                $new_ph -> save();

                $pharmacy = new pharmacy;
                $pharmacy -> user_id = $new_ph -> id;

                $pharmacy -> save();

                $data = [
                    'user' => $new_ph,
                    'pharmacy' => $pharmacy
                ];
            }
            elseif ($role == '3'){
//             sign up as doctor, need to make the user first then get the user id for doctors table
                $new_dr = new user;
                $new_dr -> username = $request -> username;
                $new_dr -> email = $request -> email;
                $new_dr -> role_id = $request -> role_id;
                $new_dr -> api_token = $api_token;

                $hashed = Hash::make($request -> password);
                $new_dr -> password = $hashed;

                $new_dr -> save();

                $doctor = new doctor;
                $doctor -> user_id = $new_dr -> id;

                $doctor -> save();

                $data = [
                    'user' => $new_dr,
                    'doctor' => $doctor
                ];
            }
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }


//    Will be moved to settings / Edit profile

/*
    public function show2(){
        $countries = country::all();
        $cities = city::all();
        $genders = gender::all();
        $specialities = specialities::all();

        $isFailed = false;
        $data = [];
        $errors =  [];

        $data = [
            'countries' => $countries,
            'cities' => $cities,
            'genders' => $genders,
            'specialites' => $specialities,
        ];


        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }

    public function signup2(Request $request){
        $complete_user = new user;

        $isFailed = false;
        $data = [];
        $errors =  [];

        $complete_user -> id = $request -> id;
        $complete_user -> role_id = $request -> role_id;
        $complete_user -> first_name = $request -> first_name;
        $complete_user -> country_id = $request -> country_id;
        $complete_user -> city_id = $request -> city_id;
        $complete_user -> phone = $request -> phone;

        if ($complete_user -> role_id == '1'){
            $complete_user -> last_name = $request -> last_name;
            $complete_user -> address = $request -> address;
            $complete_user -> gender_id = $request -> gender_id;

            $complete_user -> where('id', $complete_user -> id)
                -> update(
                    ['first_name' => $complete_user -> first_name,
                    'last_name' => $complete_user -> last_name,
                    'phone' => $complete_user -> phone,
                    'gender_id' => $complete_user -> gender_id,
                    'country_id' => $complete_user -> country_id,
                    'city_id' => $complete_user -> city_id,
                    'address' => $complete_user -> address]
                );

            $user = user::where('id', $complete_user -> id)->first();

            $data = [
                'user' => $user
            ];
        }
        elseif ($complete_user -> role_id == '2'){
            $pharmacy = new pharmacy;
            $pharmacy -> address = $request -> address;

            $complete_user -> where('id', $complete_user -> id)
                -> update(
                    ['first_name' => $complete_user -> first_name,
                        'phone' => $complete_user -> phone,
                        'country_id' => $complete_user -> country_id,
                        'city_id' => $complete_user -> city_id]);

            $user = user::where('id', $complete_user -> id)->first();

            $pharmacy -> where('user_id', $complete_user -> id)
                -> update([
                    'address' => $pharmacy -> address
                ]);

            $pharmacy = pharmacy::where('user_id', $complete_user -> id)->first();

            $data = [
                'user' => $user,
                'pharmacy' => $pharmacy
            ];

        }
        elseif ($complete_user -> role_id == '3'){
            $doctor = new doctor;
            $doctor -> last_name = $request -> last_name;
            $doctor -> speciality_id = $request -> speciality_id;
            $doctor -> qualifications = $request -> qualifications;
            $doctor -> address = $request -> address;

            $complete_user -> where('id', $complete_user -> id)
                -> update(
                    ['first_name' => $complete_user -> first_name,
                        'last_name' => $doctor -> last_name,
                        'phone' => $complete_user -> phone,
                        'gender_id' => $complete_user -> gender_id,
                        'country_id' => $complete_user -> country_id,
                        'city_id' => $complete_user -> city_id]
                );

            $user = user::where('id', $complete_user -> id)->first();

            $doctor -> where('user_id', $complete_user -> id)
                -> update([
                    'speciality_id' => $doctor -> speciality_id,
                    'qualifications' => $doctor -> qualifications,
                    'address' => $doctor -> address
                ]);

            $doctor = doctor::where('user_id', $complete_user -> id)->first();

            $data = [
                'user' => $user,
                'doctor' => $doctor
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }

*/

// End of edited code

}

