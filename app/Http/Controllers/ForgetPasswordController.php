<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\ForgetPassword;


class ForgetPasswordController extends Controller
{
    public function getEmail(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $email = $request -> email;
        $user = User::where('email', $email)->first();
        if($user == null){
            $isFailed = true;
            $errors += [
                'email' => 'this email does not exist'
            ];
        }
        else{
            $user_pass = ForgetPassword::where('email', $email)->first();
            if($user_pass == null){
                $code = Rand(10000, 99999);

                $new_user_pass = new ForgetPassword;
                $new_user_pass -> email = $email;
                $new_user_pass -> code = $code;
                $new_user_pass -> save();

                $data += [
                    'success' => 'check your email for the code',
                ];
            }
            else{
                if(($user_pass -> updated_at) >= now()->subMinutes(30)->toDateTimeString()){
                    // this means we still have time to update the password
                    if(($user_pass -> count) < 3){
                        // send the same code again and increment the count
                        $old_count = ($user_pass -> count) + 1;
                        ForgetPassword::where('id', $user_pass -> id)
                            -> update(['count' => $old_count]);

                        $data += [
                            'success' => 'check your email for the code, you have ' . (3 - $old_count) . ' tries',
                        ];
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'timelimit' => 'you have to wait 30 minutes before trying again'
                        ];
                    }
                }
                else{
                    // this means either the user used his 3 attempts and had to wait 30 minutes
                    // OR the user didn't use his code for 30 minutes and now it's not valid
                    $code = Rand(10000, 99999);

                    ForgetPassword::where('id', $user_pass -> id)->delete();

                    $new_user_pass = new ForgetPassword;
                    $new_user_pass -> email = $email;
                    $new_user_pass -> code = $code;
                    $new_user_pass -> save();

                    $data += [
                        'success' => 'check your email for the code',
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


    public function updatePassword(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $email = $request -> email;
        $code = $request -> code;
        $user = ForgetPassword::where(['email' => $email, 'code' => $code])->first();
        if($user == null){
            $isFailed = true;
            $errors += [
                'email' => 'how the f*ck did you get in here?'
            ];
        }
        else{
            if(($user -> updated_at) >= now()->subMinutes(30)->toDateTimeString()){
                $password = $request -> password;
                $existing_password = User::select('password')->where('email', $email)->first()-> password;
                if (Hash::check($password, $existing_password)){
                    $isFailed = true;
                    $errors += [
                        'password' => 'your new password can not be your old password',
                    ];
                }
                else{
                    $hashed = Hash::make($request -> password);
                    User::where('email', $email)
                        -> update(['password' => $hashed]);

                    ForgetPassword::where('email', $email)->where('code', $code)->delete();

                    $data += [
                        'success' => 'password changed successfully'
                    ];
                }
            }
            else{
                $isFailed = true;
                $errors += [
                    'timelimit' => 'your code expired, request a new code',
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
}
