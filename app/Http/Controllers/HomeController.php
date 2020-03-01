<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Image;

class HomeController extends Controller
{
    public function mobileIndex(Request $request){
        $api_token = $request -> api_token;

        $isFailed = false;
        $data = [];
        $errors =  [];

        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'api_token' => 'this token does not match'
            ];
        }
        else{
            $image_id = $user -> image_id;
            $image = Image::where('id', $image_id)->first();
            if($image != null){
                $image_path = $image -> path;
            }
            else{
                $image_path = null;
            }
            $data += [
                'full_name' => $user -> full_name,
                'image' => $image_path
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
