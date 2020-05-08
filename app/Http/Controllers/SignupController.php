<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


use App\User;
use App\City;
use App\Doctor;
use App\Pharmacy;
use App\Speciality;
use App\UserRole;
use PhpParser\Comment\Doc;

class SignupController extends Controller
{


    public function show(){
        $cities = City::all();

        $isFailed = false;
        $data = [];
        $errors =  [];

        if($cities->isEmpty()){
            $isFailed = true;
            $errors = [
                'error' => 'error connecting to server',
            ];
        }
        else{
            $cities_response = [];
            foreach($cities as $city){
                $cities_response[] = [
                    'id' => $city -> id,
                    'name' => $city -> name,
                ];
            }
            $data = [
                'cities' => $cities_response,
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response, 200);
    }


    public function mobileSignUp(Request $request){
        $role = $request -> role_id;
        $email = $request -> email;
        $full_name = $request -> full_name;
        $city_id = $request -> city_id;

        $isFailed = false;
        $data = [];
        $errors =  [];

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:6|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:50',
        ]);

        if ($validator->fails()){
            $isFailed = true;
            $validator_errors = $validator -> errors();
            if($validator -> errors() -> first('email') != []){
                $errors += [
                    'user' => 'please type a valid email',
                ];
            }
            if($validator_errors -> first('password') != []){
                $errors += [
                    'password' => 'the password field must be at least 8 characters'
                ];
            }
            if($validator_errors -> first('full_name') != []){
                $errors += [
                    'full_name' => 'the name field must be at least 8 characters'
                ];
            }
        }
//        Check existing records in database for conflicts
        $all_users = User::all();
        foreach ($all_users as $user){
            if ($user -> email == $email and $user -> role_id == $role){
//                Add error that this email is already in database with same user role
                $errors += [
                    'email' => 'This email address is already in use'
                ];
                $isFailed = true;
            }
        }

        if($isFailed == false){
//            Generate api_token
            $api_token = Str::random(80);
            if($role == '1'){
//                sign up as customer
                if($request -> city_id == null){
                    $isFailed = true;
                    $errors += [
                        'error' => 'can not sign up without a city'
                    ];
                }
                else{
                    $new_user = new User;
                    $new_user -> full_name = $full_name;
                    $new_user -> email = $request -> email;
                    $new_user -> role_id = $request -> role_id;
                    $new_user -> api_token = $api_token;
                    $hashed = Hash::make($request -> password);
                    $new_user -> password = $hashed;
                    $new_user -> city_id = $request -> city_id;

                    if($new_user -> save()){
                        $data = [
                            'success' => 'Registeration successful'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'error signing up, please try again'
                        ];
                    }
                }
            }
            elseif ($role == '2'){
//                 sign up as pharmacy, need to make the user first then get the user id for pharmacies table
                $new_ph = new User;
                $new_ph -> full_name = $request -> full_name;
                $new_ph -> email = $request -> email;
                $new_ph -> role_id = $request -> role_id;
                $new_ph -> api_token = $api_token;
                $hashed = Hash::make($request -> password);
                $new_ph -> password = $hashed;
                if($new_ph -> save()){
                    $pharmacy = new Pharmacy;
                    $pharmacy -> user_id = $new_ph -> id;
                    if($pharmacy -> save()){
                        $data = [
                            'success' => 'Registeration successful'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'error signing up, please try again'
                        ];
                    }
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'error signing up, please try again'
                    ];
                }
            }
            elseif ($role == '3'){
//             sign up as doctor, need to make the user first then get the user id for doctors table
                $new_dr = new User;
                $new_dr -> full_name = $request -> full_name;
                $new_dr -> email = $request -> email;
                $new_dr -> role_id = $request -> role_id;
                $new_dr -> api_token = $api_token;
                $hashed = Hash::make($request -> password);
                $new_dr -> password = $hashed;
                if($new_dr -> save()){
                    $doctor = new Doctor;
                    $doctor -> user_id = $new_dr -> id;
                    $doctor -> duration = 0;
                    if($doctor -> save()){
                        $data = [
                            'success' => 'Registeration successful'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'error signing up, please try again'
                        ];
                    }
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'error signing up, please try again'
                    ];
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

    public function completeSignupData(Request $request){
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
            $cities = City::all();
            $specialities = Speciality::all();

            $isFailed = false;
            $data = [];
            $errors =  [];

            $data = [
                'cities' => $cities,
                'specialites' => $specialities,
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors,
        ];

        return response()->json($response);
    }

    public function completeSignupSubmit(Request $request){
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
            if($user -> role_id == 2){
//                the case of a pharmacy type user
                if($request -> city_id != null || $request -> address != null || $request -> phone != null){
                    $is_complete = 0;
                    if($request -> city_id != null && $request -> address != null && $request -> phone != null){
                        $is_complete = 1;
                    }
                    if($request -> hasFile('image')){
                        $image = $request->file('image');
                        $extension = $image->getClientOriginalExtension();
                        $imageName = 'IMG_' . time();
                        $file = Storage::disk('public')->put('pharmacy/' . $imageName . '.' . $extension, File::get($image));
                        $image_path  = new Image;
                        $image_path -> path = 'pharmacy/' . $imageName;
                        $image_path -> extension = $extension;
                        $image_path -> save();
                        $image_id = $image_path -> id;
                    }
                    else{
                        $image_id = null;
                    }
                    User::where('id', $user -> id)->update([
                        'city_id' => $request -> city_id,
                        'image_id' => $image_id,
                        'is_complete' => $is_complete,
                        'phone' => $request -> phone,
                    ]);
                    Pharmacy::where('user_id', $user -> id)->update([
                        'address' => $request -> address,
                    ]);
                    $data = [
                        'success' => 'data entered successfully'
                    ];
                }
                else{
                    if($request -> city_id == null && $request -> address == null && $request -> phone == null){
                        $isFailed = true;
                        $errors += [
                            'data' => 'request is empty'
                        ];
                    }
                }
            }
            elseif ($user -> role_id == 3){
//                the case of a doctor type user
//                we have some data can be nullable such as homevisit(callup) fees and degrees
                $is_complete = 0;
                $null_count = 0;
                $image_id = null;
                if($request -> speciality_id == null){
                    $null_count += 1;
                }
                if($request -> city_id == null){
                    $null_count += 1;
                }
                if($request -> address == null){
                    $null_count += 1;
                }
                if($request -> fees == null){
                    $null_count += 1;
                }
                if($request -> duration == null){
                    $null_count += 1;
                }
                if($request -> phone == null){
                    $null_count += 1;
                }
                if(!($request -> hasFile('image'))){
                    $null_count += 1;
                }
                else{
                    $image = $request->file('image');
                    $extension = $image->getClientOriginalExtension();
                    $imageName = 'IMG_' . time();
                    $file = Storage::disk('public')->put('doctor/' . $imageName . '.' . $extension, File::get($image));
                    $image_path  = new Image;
                    $image_path -> path = 'pharmacy/' . $imageName;
                    $image_path -> extension = $extension;
                    $image_path -> save();
                    $image_id = $image_path -> id;
                }
//                check to point to a complete profile or not
                if($null_count == 0){
                    $is_complete = 1;
                }
                elseif($null_count == 7){
                    $isFailed = true;
                    $errors += [
                        'data' => 'request is empty'
                    ];
                }

                if($isFailed == false){
                    $offers_callup = 0;
                    if($request -> offers_callup == 1){
                        $offers_callup = 1;
                    }

                    User::where('id', $user -> id)->update([
                        'city_id' => $request -> city_id,
                        'image_id' => $image_id,
                        'phone' => $request -> phone,
                    ]);
                    Doctor::where('user_id', $user -> id)->update([
                        'speciality_id' => $request -> speciality_id,
                        'address' => $request -> address,
                        'fees' => $request -> fees,
                        'duration' => $request -> duration,
                        'offers_callup' => $offers_callup,
                        'callup_fees' => $request -> callup_fees,
                    ]);
                    $data = [
                        'success' => 'data entered successfully'
                    ];
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

    public function mobileValidateToken(request $request){
        $user = User::where('api_token', $request -> api_token)->first();

        $isFailed = false;
        $data = [];
        $errors =  [];

        if ($user != null){
            $api_token = $user -> api_token;
            $data += [
                'api_token' => $api_token
            ];
        }
        else {
            $isFailed = true;
            $errors = [
                'api_token' => 'failed to authorize token'
            ];
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

    public function webSignup(Request $request){
        $role = $request -> role_id;
        $email = $request -> email;
        $full_name = $request -> full_name;
        $city_id = $request -> city_id;

        $isFailed = false;
        $data = [];
        $errors =  [];

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:6|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:50',
        ]);

        if ($validator->fails()){
            $isFailed = true;
            $validator_errors = $validator -> errors();
            if($validator -> errors() -> first('email') != []){
                $errors += [
                    'user' => 'please type a valid email',
                ];
            }
            if($validator_errors -> first('password') != []){
                $errors += [
                    'password' => 'the password field must be at least 8 characters'
                ];
            }
            if($validator_errors -> first('full_name') != []){
                $errors += [
                    'full_name' => 'the name field must be at least 8 characters'
                ];
            }
        }
//        Check existing records in database for conflicts
        $all_users = User::all();
        foreach ($all_users as $user){
            if ($user -> email == $email and $user -> role_id == $role){
//                Add error that this email is already in database with same user role
                $errors += [
                    'email' => 'This email address is already in use'
                ];
                $isFailed = true;
            }
        }

        if($isFailed == false){
//            Generate api_token
            $api_token = Str::random(80);
            if($role == '1'){
//                sign up as customer
                if($request -> city_id == null){
                    $isFailed = true;
                    $errors += [
                        'error' => 'can not sign up without a city'
                    ];
                }
                else{
                    $new_user = new User;
                    $new_user -> full_name = $full_name;
                    $new_user -> email = $request -> email;
                    $new_user -> role_id = $request -> role_id;
                    $new_user -> api_token = $api_token;
                    $hashed = Hash::make($request -> password);
                    $new_user -> password = $hashed;
                    $new_user -> city_id = $request -> city_id;

                    if($new_user -> save()){
                        $data = [
                            'success' => 'Registeration successful'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'error signing up, please try again'
                        ];
                    }
                }
            }
            elseif ($role == '2'){
//                 sign up as pharmacy, need to make the user first then get the user id for pharmacies table
                $new_ph = new User;
                $new_ph -> full_name = $request -> full_name;
                $new_ph -> email = $request -> email;
                $new_ph -> role_id = $request -> role_id;
                $new_ph -> api_token = $api_token;
                $hashed = Hash::make($request -> password);
                $new_ph -> password = $hashed;
                if($new_ph -> save()){
                    $pharmacy = new Pharmacy;
                    $pharmacy -> user_id = $new_ph -> id;
                    if($pharmacy -> save()){
                        $data = [
                            'success' => 'Registeration successful'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'error signing up, please try again'
                        ];
                    }
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'error signing up, please try again'
                    ];
                }
            }
            elseif ($role == '3'){
//             sign up as doctor, need to make the user first then get the user id for doctors table
                $new_dr = new User;
                $new_dr -> full_name = $request -> full_name;
                $new_dr -> email = $request -> email;
                $new_dr -> role_id = $request -> role_id;
                $new_dr -> api_token = $api_token;
                $hashed = Hash::make($request -> password);
                $new_dr -> password = $hashed;
                if($new_dr -> save()){
                    $doctor = new Doctor;
                    $doctor -> user_id = $new_dr -> id;
                    $doctor -> duration = 0;
                    if($doctor -> save()){
                        $data = [
                            'success' => 'Registeration successful'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'error signing up, please try again'
                        ];
                    }
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'error signing up, please try again'
                    ];
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

