<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localization;

class LocalController extends Controller
{
    public function mobileUserLocal($lang, $app){
        $language = Localization::select('key', $lang)->where('app', $app)->orWhere('app', 'c')->get();

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
            // $data += [
            //     'language' => $language
            // ];
            $local = [];
            foreach($language as $key){
                $local += [
                    $key -> key => $key -> $lang
                ];
            }
            $data = [
                'local' => $local
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
