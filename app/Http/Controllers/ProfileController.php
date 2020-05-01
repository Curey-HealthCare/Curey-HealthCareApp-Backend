<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Doctor;
use App\ForgetPassword;
use App\Pharmacy;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Image;
use App\User;
use App\City;
use App\Gender;
use function Sodium\add;

class ProfileController extends Controller
{
    public function webGetData(Request $request){
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
            $specialities = [];
            $degrees = [];
            $spec = 0;
            $image_url = null;
            $address = null;
            $image = Image::where('id', $user -> image_id)->first();
            if($image != null){
                $image_path = Storage::url($image -> path . '.' . $image -> extension);
                $image_url = asset($image_path);
                $address = null;
            }
            $cities = [];
            $city = City::all();
            foreach ($city as $item){
                $cities[] = [
                    'id' => $item -> id,
                    'name' => $item -> name,
                ];
            }
            if($user -> role_id == 1){
                $address = $user -> address;
                if($image == null){
                    $image_url = asset('default/user.png');
                }
            }
            elseif ($user -> role_id == 2){
                $pharmacy = Pharmacy::where('user_id', $user -> id)->first();
                if($pharmacy != null){
                    $address = $pharmacy -> address;
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'unexpected failure'
                    ];
                }
                if($image == null){
                    $image_url = asset('default/pharmacy.png');
                }
            }
            elseif ($user -> role_id == 3){
                $doctor = Doctor::where('user_id', $user -> id)->first();
                if($doctor != null){
                    $address = $doctor -> address;
                    $spec = $doctor -> speciality_id;
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'unexpected failure'
                    ];
                }
                $specs = Speciality::all();

                foreach ($specs as $speciality){
                    $specialities[] = [
                        'id' => $speciality -> id,
                        'name' => $speciality -> name,
                    ];
                }
                if($image == null){
                    $image_url = asset('default/doctor.png');
                }
                $degree = Degree::where('doctor_id', $doctor -> id)->get();
                if($degree -> isNotEmpty()){
                    foreach ($degree as $item){
                        $degrees[] = [
                            'id' => $item -> id,
                            'name' => $item -> degree,
                        ];
                    }
                }
            }
            $profile = [
                'name' => $user -> full_name,
                'email' => $user -> email,
                'image' => $image_url,
                'address' => $address,
                'phone' => $user -> phone,
                'role' => $user -> role_id,
            ];
            if($user -> role_id == 3){
                $profile += [
                    'speciality' => $spec,
                    'fees' => $doctor -> fees,
                    'duration' => $doctor -> duration,
                    'callup' => $doctor -> offers_callup,
                    'callup_fees' => $doctor -> callup_fees,
                    'degrees' => $degrees,
                ];
            }

            $data = [
                'profile' => $profile,
                'cities' => $cities,
                'specialities' => $specialities
            ];

        }
        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webChangeName(Request $request){
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
            $full_name = $request -> full_name;
            if($full_name == null || $full_name == ''){
                $isFailed = true;
                $errors += [
                    'name' => 'name is empty'
                ];
            }
            else{
                User::where('api_token', $api_token)->update(['full_name' => $full_name]);
                $data += [
                    'name' => 'changed successfully'
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

    public function webChangeImage(Request $request){
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
//            delete the previous photo if existed
            $image_id = $user -> image_id;
            $image = Image::where('id', $image_id)->first();
            if($image != null){
                $old_path = $image -> path;
                if(is_file($old_path)){
                    Storage::delete($old_path);
                }
                User::where('api_token', $api_token)->update(['image_id' => null]);
                Image::where('id', $image_id)->delete();
            }
//            save the new image
            $path = 'user/';
            if($user -> role_id == 1){
                $path = 'user/';
            }
            if($user -> role_id == 2){
                $path = 'pharmacy/';
            }
            if($user -> role_id == 3){
                $path = 'doctor/';
            }
            $new_image = $request->file('image');
            $extension = $new_image->getClientOriginalExtension();
            $imageName = 'IMG_' . time();
            $file = Storage::disk('public')->put($path . $imageName . '.' . $extension, File::get($image));
            $image_path  = new Image;
            $image_path -> path = $path . $imageName;
            $image_path -> extension = $extension;
            if($image_path -> save()){
                User::where('api_token', $api_token)->update(['image_id' => $image_path -> id]);
                $data = [
                    'success' => 'image updated successfully'
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

    public function webChangeAddress(Request $request){
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
            if($request -> address == null || $request -> address == '' || $request -> city_id == null){
                $isFailed = true;
                $errors += [
                    'address' => 'address empty'
                ];
            }
            else{
                if($user -> role_id == 1){
                    User::where('api_token', $api_token)->update(['address' => $request -> address, 'city_id' => $request -> city_id]);
                }
                if($user -> role_id == 2){
                    User::where('api_token', $api_token)->update(['city_id' => $request -> city_id]);
                    Pharmacy::where('user_id', $user -> id)->update(['address' => $request -> address, ]);
                }
                if($user -> role_id == 3){
                    User::where('api_token', $api_token)->update(['city_id' => $request -> city_id]);
                    Doctor::where('user_id', $user -> id)->update(['address' => $request -> address, ]);
                }
                $data += [
                    'address' => 'changed successfully'
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

    public function webChangeEmail(Request $request){
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
            if($request -> email == null || $request -> email == ''){
                $isFailed = true;
                $errors += [
                    'address' => 'address empty'
                ];
            }
            else{
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:50',
                ]);
                if($validator -> fails()){
                    $isFailed = true;
                    $errors += [
                        'email' => 'unvalid email'
                    ];
                }
                else{
                    $existing = User::where('email', $request -> email)->get();
                    if($existing -> isEmpty()){
                        User::where('api_token', $api_token)->update(['email' => $request -> email]);
                        $data += [
                            'email' => 'changed successfully'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'email' => 'email is already in use'
                        ];
                    }
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

    public function webChangePassword(Request $request){
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
            if($request -> old_password != null || $request -> old_password != ''){
                $new_password = $request -> new_password;
                $existing_password = User::select('password')->where('api_token', $api_token)->first()-> password;
                if (Hash::check($request -> old_password, $existing_password)){
                    if($new_password != null || $new_password != ''){
                        $hashed = Hash::make($new_password);
                        User::where('api_token', $api_token)
                            -> update(['password' => $hashed]);

                        $data += [
                            'success' => 'password changed successfully'
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'new_password' => 'new password is empty'
                        ];
                    }

                }
                else{
                    $isFailed = true;
                    $errors += [
                        'old_password' => 'wrong password'
                    ];
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

    public function webChangePhone(Request $request){
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
            if($request -> phone != null || $request -> phone != ''){
                User::where('api_token', $api_token)->update(['phone' => $request -> phone]);
                $data += [
                    'success' => 'phone number changed successfully'
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'phone' => 'phone number is empty'
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

    public function webChangeSpeciality(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 3])->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            if($request -> speciality != null || $request -> speciality != ''){
                Doctor::where('user_id', $user -> id)->update(['speciality_id' => $request -> speciality]);
                $data += [
                    'success' => 'speciality changed successfully'
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'speciality' => 'speciality is empty'
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

    public function webUpdateFees(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 3])->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            if($request -> fees != null || $request -> fees != ''){
                Doctor::where('user_id', $user -> id)->update(['fees' => $request -> fees]);
                $data += [
                    'success' => 'fees changed successfully'
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'fees' => 'fees empty'
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
