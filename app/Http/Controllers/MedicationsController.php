<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\City;
use App\Image;
use App\UserRole;
use App\Keyword;
use App\Product;
use App\ProductKeyword;
use App\Pharmacy;
use App\ProductPharmacy;
use App\PharmacyRating;
use App\Order;

class MedicationsController extends Controller
{
    public function mobileShowAll(Request $request){
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

        if($isFailed == false){
            $city_id = $user -> city_id;
            $pharmacies = User::where('city_id', $city_id)->get();

            if($pharmacies != []){
                $all_pharmacies = [];
                foreach($pharmacies as $pharmacy){
                    $pharma_id = $pharmacy -> id;
                    $pharma = Pharmacy::find($pharma_id);
                    if($pharma != null){
                        $pharma_id =  $pharma -> id;
                        $products_pharmacy = ProductPharmacy::where('pharmacy_id', $pharma_id)->get();

                        if($products_pharmacy != []){
                            foreach($products_pharmacy as $pro){
                                $product_id = $pro -> product_id;
                                $product = Product::find($product_id);
                                $image_id = $product -> image_id;
                                $image = Image::where('id', $image_id)->first();
                                if($image != null){
                                    $image_path = $image -> path;
                                }
                                else{
                                    $image_path = null;
                                }
                                $final_product = [
                                    'id' => $product -> id,
                                    'name' => $product -> name,
                                    'image' => $image_path,
                                    'price' => $product -> price
                                ];

                                $data[] = $final_product;
                            }
                        }
                    }
                }
            }
/*
            $all_products = Product::all();
            $product = [];
            foreach($all_products as $pro){

                $image_id = $pro -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = $image -> path;
                }
                else{
                    $image_path = null;
                }

                // Build Response
                $product = [
                    'id' => $pro -> id,
                    'name' => $pro -> name,
                    'image' => $image_path,
                    'price' => $pro -> price
                ];

                $data[] = $product;
            }
*/
        }


        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
}
