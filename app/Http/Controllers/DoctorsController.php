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


}
