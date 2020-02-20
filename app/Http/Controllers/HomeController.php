<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    public function mobileIndex(Request $request){
        $api_token = $request -> api_token;

        $isFailed = false;
        $data = [];
        $errors =  [];

        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'api_token' => 'this token does not match'
            ];
        }
        else{
            // TO DO
            // replace the image id in the response with the image path from images table
            $data += [
                'full_name' => $user -> full_name,
                'image' => $user -> image_id
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
