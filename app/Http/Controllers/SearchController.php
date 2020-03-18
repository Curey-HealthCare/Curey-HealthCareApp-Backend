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
use App\Favourite;

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
        $doctors_response = [];
        $specs = [];
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
                $max = $doctors_count / 5;
                for ($i=0; $i<= $max; $i++){
                    $doctors = User::where('role_id', '3')
                    ->where('full_name', 'LIKE', '%'. $name .'%')
                    ->skip($i*5)
                    ->take(5)
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
                            'offers_callup' => $doc -> offers_callup,
                            'overall_rating' => $ratings,
                            'city_id' => $doctor_user -> city_id,
                        ];
                        $doctors_response[] = $doctor;
                    }
                }
            }
            $specialities = Speciality::all();
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
            $cities_data = City::all();
            $cities = [];
            foreach($cities_data as $city){
                $cities[] = [
                    'id' => $city -> id,
                    'name' => $city -> name,
                ];
            }
            $data = [
                'doctors' => $doctors_response,
                'specialities' => $specs,
                'cities' => $cities,
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
                $products_response = [];
                foreach($products as $pro){

                    $image_id = $pro -> image_id;
                    $image = Image::where('id', $image_id)->first();

                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }

                    $favourite = Favourite::where('user_id', $user -> id)->where('product_id', $pro -> id)->first();
                    $isFav = false;
                    if($favourite != null){
                        $isFav = true;
                    }
                    $keywords = ProductKeyword::where('product_id' , $product_id)->get();
                    $keywords_ids = [];
                    if($keywords -> isNotEmpty()){
                        foreach($keywords as $keyword){
                            $keyword_id = $keyword -> keyword_id;
                            $keywords_ids[] = $keyword_id;
                        }
                    }
                    $final_product = [
                        'id' => $pro -> id,
                        'name' => $pro -> name,
                        'image' => $image_path,
                        'price' => $pro -> price,
                        'is_favourite' => $isFav,
                        'keywords' => $keywords_ids,
                    ];

                    $products_response[] = $final_product;
                }
            }
        }
        // get keywords for filters
        $keywords = Keyword::all();

        foreach($keywords as $key){
            $keywords_response[] = [
                'id' => $key -> id,
                'name' => $key -> name,
            ];
        }
        if($isFailed == false){
            $data = [
                'products' => $products_response,
                'keywords' => $keywords_response,
            ];
        }
        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    /* Web Tailored Functions */
    /* ***************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    ******************************************************************************************************
    */

    public function webSearchDoctors(Request $request){
        $name = $request -> name;
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        // $user = null;
        $user = User::where('api_token', $api_token)->first();
        $doctors_response = [];
        $specs = [];
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
                $max = $doctors_count / 5;
                for ($i=0; $i<= $max; $i++){
                    $doctors = User::where('role_id', '3')
                    ->where('full_name', 'LIKE', '%'. $name .'%')
                    ->skip($i*5)
                    ->take(5)
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
                            'offers_callup' => $doc -> offers_callup,
                            'overall_rating' => $ratings,
                            'city_id' => $doctor_user -> city_id,
                        ];
                        $doctors_response[] = $doctor;
                    }
                }
            }
            $specialities = Speciality::all();
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
            $cities_data = City::all();
            $cities = [];
            foreach($cities_data as $city){
                $cities[] = [
                    'id' => $city -> id,
                    'name' => $city -> name,
                ];
            }
            $data = [
                'doctors' => $doctors_response,
                'specialities' => $specs,
                'cities' => $cities,
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webSearchProducts(Request $request){
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
                $products_response = [];
                foreach($products as $pro){

                    $image_id = $pro -> image_id;
                    $image = Image::where('id', $image_id)->first();

                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }

                    $favourite = Favourite::where('user_id', $user -> id)->where('product_id', $pro -> id)->first();
                    $isFav = false;
                    if($favourite != null){
                        $isFav = true;
                    }
                    $keywords = ProductKeyword::where('product_id' , $product_id)->get();
                    $keywords_ids = [];
                    if($keywords -> isNotEmpty()){
                        foreach($keywords as $keyword){
                            $keyword_id = $keyword -> keyword_id;
                            $keywords_ids[] = $keyword_id;
                        }
                    }
                    $final_product = [
                        'id' => $pro -> id,
                        'name' => $pro -> name,
                        'image' => $image_path,
                        'price' => $pro -> price,
                        'is_favourite' => $isFav,
                        'description' => $pro -> description,
                        'keywords' => $keywords_ids,
                    ];

                    $products_response[] = $final_product;
                }
            }
        }

        // get keywords for filters
        $keywords = Keyword::all();

        foreach($keywords as $key){
            $keywords_response[] = [
                'id' => $key -> id,
                'name' => $key -> name,
            ];
        }
        if($isFailed == false){
            $data = [
                'products' => $products_response,
                'keywords' => $keywords_response,
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
