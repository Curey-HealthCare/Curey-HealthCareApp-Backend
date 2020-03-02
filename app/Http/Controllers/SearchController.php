<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\City;
use App\Doctor;
use App\Image;
use App\Speciality;
use App\DoctorRating;
use App\Appointment;
use App\Keyword;
use App\Product;
use App\ProductKeyword;
use App\Pharmacy;
use App\ProductPharmacy;
use App\PharmacyRating;
use App\Order;

class SearchController extends Controller
{

    public function mobileSearchDoctors(Request $request){
        $name = $request -> name;
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        // $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors []  = [ 'auth' => 'authentication failed'];
        }
        else{
            $doctors_count = User::where('full_name', 'LIKE', '%'. $name .'%')->where('role_id', '3')->count();
            if($doctors_count == 0){
                $isFailed = true;
                $errors[] = [
                    'error' => 'no results'
                ];
            }
            else{
                $doctors_response = [];
                $max = $doctors_count / 5;

                // We should be using $max instead of 5
                for ($i=0; $i< 5; $i++){
                    $doctors = User::where('role_id', '3')
                    ->where('full_name', 'LIKE', '%'. $name .'%')
                    ->skip($i*1)
                    ->take(1)
                    ->get();
                    foreach ($doctors as $doctor_user){
                        $id = $doctor_user -> id;
                        $doc = Doctor::where('user_id', $id)->first();
                        $spec_id = $doc -> speciality_id;
                        $speciality = Speciality::where('id', $spec_id)->first();
                        if ($speciality == NULL){
                            $s_name = NULL;
                        }
                        else{
                            $s_name = $speciality -> name;
                        }
                        // Get the doctor's photo
                        $image_id = $doctor_user -> image_id;
                        $image = Image::where('id', $image_id)->first();
                        if($image != null){
                            $image_path = $image -> path;
                        }
                        else{
                            $image_path = null;
                        }
    
                        // show overall rating
                        $doc_id = $doc -> id;
                        $appointments = Appointment::where('doctor_id', $doc_id)->get();
                        $appointments_count = $appointments->count();
                        $ratings = 0;
                        $overall_rating = 0;
                        if(!($appointments->isEmpty())){
                            $overall_rate = 0;
                            foreach($appointments as $appointment){
                                $appointment_id = $appointment -> id;
                                $rating = DoctorRating::where('appointment_id', $appointment_id)->first();
                                $appointment_rating = 0;
    
                                if($rating != null){
                                    $behavior = $rating -> behavior;
                                    $price = $rating -> price;
                                    $efficiency = $rating -> efficiency;
                                    $appointment_rating = ($behavior + $price + $efficiency) / 3;
                                    $overall_rate += $appointment_rating;
                                }
                            }
                            $overall_rating = $overall_rate / $appointments_count;
                            $ratings = $overall_rating;
                        }
                        else{
                            $ratings = 0;
                        }
    
                        $doctor = [
                            'id' => $doc -> id,
                            'full_name' => $doctor_user -> full_name,
                            'speciality' => $s_name,
                            'image' => $image_path,
                            'fees' => $doc -> fees,
                            'overall_rating' => $ratings
                        ];
                        $doctors_response[] = $doctor;
                    }
                }
                $specialities = Speciality::all();
                $specs = [];
                if($specialities -> isEmpty()){
                    $specs = [];
                }
                else{
                    foreach($specialities as $spec){
                        $specs[] = [
                            'id' => $spec -> id,
                            'name' => $spec -> name,
                        ];
                    }
                }
            }
            $data = [
                'doctors' => $doctors_response,
                'specialities' => $specs,
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function mobileSearchProducts(Request $request){
        $name = $request -> name;
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors []  = [ 'auth' => 'authentication failed'];
        }

        if($isFailed == false){
            $products = Product::where('name', 'LIKE', '%'. $name .'%')->get();
            if($products->isEmpty()){
                $isFailed = true;
                $errors[] = [
                    'error' => 'no results'
                ];
            }
            else{
                foreach($products as $pro){

                    $image_id = $pro -> image_id;
                    $image = Image::where('id', $image_id)->first();

                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    $final_product = [
                        'id' => $pro -> id,
                        'name' => $pro -> name,
                        'image' => $image_path,
                        'price' => $pro -> price
                    ];

                    $data[] = $final_product;
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
