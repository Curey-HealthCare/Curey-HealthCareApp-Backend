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
    $user -> username = $request -> username;
    $user -> email = $request -> email;
    $user -> phone = $request -> phone;
    $user -> password = $request -> password;
    if($isFailed == false){
    if($user-> username !=null)
    {
        if ([$user => $request('email')])
    
        {
            $existing_data = user::find(email);
        }
        else if ([$user => $request('username')])
    
        { 
            $existing_data = user::find(username);
           
        }
        else if ([$user => $request('phone')])
    
        {
            
            $existing_data = user::find(email);
        }
        if ($existing_data != null)
        {
            if ($login_user -> password == $existing_data -> password)
            {
                $response = [
                    'isFailed' => $isFailed,
                    'data' => $data,
                    'errors' => $errors,
                ];
                return response()->json($response);
            }
    }
       

    }

    }
}

}