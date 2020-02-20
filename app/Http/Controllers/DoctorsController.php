<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\City;
use App\Doctor;
use App\Gender;
use App\Image;
use App\Speciality;
use App\UserRole;
use App\DoctorRating;
use PhpParser\Comment\Doc;

class DoctorsController extends Controller
{
    // for mobile
    public function mobileShowAll(Request $request){
        // TO DO
        // DONE!!! make this function accept the location of the user and get doctors nearby //
        // add image instead of image id
        // Hash IDs

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


        if ($isFailed == false){
            $city = $user -> city_id;
            $doctors = User::where('role_id', '3')->where('city_id', $city)->get();

            if($doctors == null){
                $isFailed = true;
                $errors += [
                    'doctors' => 'no available doctors in your area yet'
                ];
            }
            else{
                // TO DO
                // only show name / specialization / image / overall rating
                $doctor = [];
                foreach ($doctors as $doc){

                    $id = $doc -> id;
                    $doc2 = Doctor::where('user_id', $id)->first();
                    $spec_id = $doc2 -> speciality_id;
                    $speciality = Speciality::find($spec_id);
                    // TO DO
                    // show reviews / show photo

                    // build response
                    $doctor = [
                        'id' => $doc -> id,
                        'full_name' => $doc -> full_name,
                        'speciality' => $speciality -> name
                    ];
                    $data += [
                        $doctor
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

    public function mobileShowOne(Request $request){
        // TO DO
        // add image instead of image id
        // Hash IDs

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

        $id = $request -> id;

        // get basic information of doctor
        $doc_user = User::find($id);

        if($doc_user == null){
            $isFailed = true;
            $errors += [
                'null' => 'can not find this doctor'
            ];
        }
        else{
            // get extra iformation of doctor
            $doc_2 = Doctor::where('user_id', $id)->first();

            // get doctor speciality name
            $spec_id = $doc_2 -> speciality_id;
            $spec = Speciality::find($spec_id);

            // TO DO
            // Add reviews, iformation about doctor, image, fees
            $doctor = [
                'id' => $id,
                'full_name' => $doc_user -> full_name,
                'speciality' => $spec -> name
            ];
            $data += [
                $doctor
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
}
