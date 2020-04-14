<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Image;
use App\Doctor;
use App\Gender;
use App\Speciality;
use App\UserRole;
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

    public function webHome(Request $request){
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
            // get the logged in user's data
            $image_id = $user -> image_id;
            $image = Image::where('id', $image_id)->first();
            if($image != null){
                $image_path = $image -> path;
            }
            else{
                $image_path = "default/user.png";
            }

            $user_data = [
                'name' => $user -> full_name,
                'image' => $image_path,
            ];

            // get top 8 doctors
            $doctors = User::where(['role_id', '=', 3], ['city_id', '!=', null])->take(8)->get();

            if($doctors == null){
                $isFailed = true;
                $errors += [
                    'doctors' => 'no available doctors in your area yet'
                ];
            }
            else{
                $doctor = [];
                $doctors_response = [];
                foreach ($doctors as $doc){

                    $id = $doc -> id;
                    $doc2 = Doctor::where('user_id', $id)->first();
                    $spec_id = $doc2 -> speciality_id;
                    $speciality = Speciality::find($spec_id);
                    if($speciality == null){
                        continue;
                    }
                    // Get the doctor's photo
                    $image_id = $doc -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = "default/doctor.png";
                    }

                    // TO DO
                    // show overall rating
                    $doc_id = $doc2 -> id;
                    $appointments = Appointment::where('doctor_id', $doc_id)->get();
                    $appointments_count = Appointment::where('doctor_id', $doc_id)->count();
                    $ratings = [];
                    $overall_rating = 0;
                    if($appointments != null && $appointments_count != 0){
                        $overall_rate = 0;
                        foreach($appointments as $appointment){
                            $appointment_id = $appointment -> id;
                            $rating = DoctorRating::where('appointment_id', $appointment_id)->first();
                            // $appointment_rating = 0;

                            if($rating != null){
                                $behavior = $rating -> behavior;
                                $price = $rating -> price;
                                $efficiency = $rating -> efficiency;
                                $appointment_rating = ($behavior + $price + $efficiency) / 3;
                                $overall_rate += $appointment_rating;
                            }
                        }
                        $overall_rating = $overall_rate / $appointments_count;
                        $ratings = [
                            'rating' => $overall_rating
                        ];
                    }
                    else{
                        $ratings = [
                            'error' => 'no available ratings yet'
                        ];
                    }

                    // build response
                    $doctor = [
                        'id' => $doc2 -> id,
                        'full_name' => $doc -> full_name,
                        'speciality' => $speciality -> name,
                        'image' => $image_path,
                        'city_id' => $doc -> city_id,
                        'offers_callup' => $doc2 -> offers_callup,
                        'fees' => $doc2 -> fees,
                        'overall_rating' => $overall_rating
                    ];
                    $doctors_response[] = $doctor;
                }

            }
            // get top 8 medications
            $city_id = $user -> city_id;
            $pharmacies = User::where('city_id', $city_id)->where('role_id', '2')->take(8)->get();

            if($pharmacies != []){
                foreach($pharmacies as $pharmacy){
                    $pharma_id = $pharmacy -> id;
                    $pharma = Pharmacy::where('user_id', $pharma_id)->first();
                    if($pharma != null){
                        $pharma_id =  $pharma -> id;
                        $products_pharmacy = ProductPharmacy::where('pharmacy_id', $pharma_id)->first();

                        if($products_pharmacy != null){
                                $product_id = $products_pharmacy -> product_id;

                                $product = Product::find($product_id);
                                $image_id = $product -> image_id;
                                $image = Image::where('id', $image_id)->first();

                                if($image != null){
                                    $image_path = $image -> path;
                                }
                                else{
                                    $image_path = "default/product.png";
                                }
                                // check if the user have the product in favourites
                                $favourite = Favourite::where('user_id', $user -> id)->where('product_id', $product -> id)->first();
                                $isFav = false;
                                if($favourite != null){
                                    $isFav = true;
                                }
                                $final_product = [
                                    'id' => $product -> id,
                                    'name' => $product -> name,
                                    'image' => $image_path,
                                    'price' => $product -> price,
                                    'is_favourite' => $isFav,
                                ];

                                $products_response[] = $final_product;
                        }
                    }
                }
            }


            $data = [
                'user_data' => $user_data,
                'top_doctors' => $doctors_response,
                'top_products' => $products_response,
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
