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
                $doctor = [];
                foreach ($doctors as $doc){

                    $id = $doc -> id;
                    $doc2 = Doctor::where('user_id', $id)->first();
                    $spec_id = $doc2 -> speciality_id;
                    $speciality = Speciality::find($spec_id);
                    // Get the doctor's photo
                    $image_id = $doc -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    // TO DO
                    // show reviews
                    /** */
                    // build response
                    $doctor = [
                        'id' => $doc -> id,
                        'full_name' => $doc -> full_name,
                        'speciality' => $speciality -> name,
                        'image' => $image_path,
                        'fees' => $doc2 -> fees,
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
            // get all informatiom about the doctor
            $doc2 = Doctor::where('user_id', $id)->first();
            // get doctor speciality name
            $spec_id = $doc2 -> speciality_id;
            $spec = Speciality::find($spec_id);
            // Get the doctor's photo
            $image_id = $doc_user -> image_id;
            $image = Image::where('id', $image_id)->first();
            if($image != null){
                $image_path = $image -> path;
            }
            else{
                $image_path = null;
            }

            // Build Response

            // Basic doctor data
            $doctor = [
                'id' => $id,
                'full_name' => $doc_user -> full_name,
                'speciality' => $spec -> name,
                'image' => $image_path,
                'qualifications' => $doc2 -> qualifications,
                'fees' => $doc2 -> fees,
                'offers_callup' => $doc2 -> offers_callup,
                'callup_fees' => $doc2 -> callup_fees
            ];
            // TO DO
            // Add reviews

            // Doctor reviews
            $reviews = [
                // TODO
            ];
            $data += [
                'doctor' => $doctor,
                'reviews' => $reviews
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
