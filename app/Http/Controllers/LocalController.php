<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localization;

class LocalController extends Controller
{
    public function mobileLocal($lang){
        $language = Localization::select('key', $lang)->get();

        $isFailed = false;
        $data = [];
        $errors =  [];

        if($language == null){
            $isFailed = true;
            $errors += [
                'error' => 'This language is not supported yet'
            ];
        }

        if($isFailed == false){
            $data += [
                'language' => $language
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
