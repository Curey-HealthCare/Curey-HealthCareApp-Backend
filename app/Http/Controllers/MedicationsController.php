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
use App\Favourite;

class MedicationsController extends Controller
{
    public function mobileShowAll(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        $keywords_response = [];
        $products_response = [];

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }

        if($isFailed == false){
            $city_id = $user -> city_id;
            $pharmacies = User::where('city_id', $city_id)->where('role_id', '2')->get();


            if($pharmacies != []){
                foreach($pharmacies as $pharmacy){
                    $pharma_id = $pharmacy -> id;
                    $pharma = Pharmacy::where('user_id', $pharma_id)->first();
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
            }

            // get keywords for filters
            $keywords = Keyword::all();

            foreach($keywords as $key){
                $keywords_response[] = [
                    'id' => $key -> id,
                    'name' => $key -> name,
                ];
            }

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

    public function mobileShowOne(Request $request){
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
            $product_id = $request -> id;
            $pro = Product::where('id', $product_id)->first();
            if($pro == null){
                $isFailed = true;
                $errors[] = [
                    'error' => 'can not find this product'
                ];
            }
            else{
                $image_id = $pro -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = $image -> path;
                }
                else{
                    $image_path = null;
                }
                $city = City::find($user -> city_id);

                $delivery_fees = $city -> delivery_fees;

                $favourite = Favourite::where('user_id', $user -> id)->where('product_id', $product_id)->first();
                $isFav = false;
                if($favourite != null){
                    $isFav = true;
                }

                $product = [
                    'id' => $product_id,
                    'name' => $pro -> name,
                    'image' => $image_path,
                    'description' => $pro -> description,
                    'price' => $pro -> price,
                    'delivery_fees' => $delivery_fees,
                    'user_address' => $user -> address,
                    'is_favourite' => $isFav,
                ];

                // get the pharmacies that has this product and exist in my city
                $pharmacies_product = ProductPharmacy::where('product_id', $product_id)->get();
                if($pharmacies_product == []){
                    $isFailed = true;
                    $errors += [
                        'error' => 'can not find this product in a pharmacy'
                    ];
                }
                else{
                    $pharmacies_response = [];
                    // echo $pharmacies_product;
                    foreach($pharmacies_product as $pharmacy_product){
                        $pharmacy_id = $pharmacy_product -> pharmacy_id;
                        $pharmacies = Pharmacy::where('id', $pharmacy_id)->first();
                        $pharmacy_userid = $pharmacies -> user_id;
                        $pharmacy = User::where(['id' => $pharmacy_userid, 'city_id' => $user -> city_id])->first();

                        if($pharmacy == null){

                        }
                        else{
                            $image_id = $pharmacy -> image_id;
                            $image = Image::where('id', $image_id)->first();
                            if($image != null){
                                $image_path = $image -> path;
                            }
                            else{
                                $image_path = null;
                            }
                            //ratings
                            $overall_rating = 0;
                            $orders = Order::where('pharmacy_id', $pharmacy_id)->get();
                            $orders_count = Order::where('pharmacy_id', $pharmacy_id)->count();
                            $ratings = [];
                            if($orders == null || $orders_count == 0){
                                // continue
                            }
                            else{
                                foreach($orders as $order)
                                {
                                    $order_id = $order -> id;
                                    $rating = PharmacyRating::where('order_id', $order_id)->first();
                                    if($rating == null){
                                        continue;
                                    }
                                    else
                                    {
                                        $rate += $rating -> rating ;
                                    }
                                }
                                $overall_rating = $rate / $orders_count;
                            }

                            // buid response for each pharmacy
                            $pharma = [
                                'id' => $pharmacy -> id,
                                'name' => $pharmacy -> full_name,
                                'address' => $pharmacies -> address,
                                'image' => $image_path,
                                'overall_rating' => $overall_rating,
                                'city_id' => $pharmacy -> city_id,
                                'product_pharmacy_id' => $pharmacy_product -> id,
                            ];
                            $pharmacies_response[] = $pharma;
                        }
                    }
                }
                if($pharmacies_response == null){
                    $isFailed = true;
                    $errors += [
                        'error' => 'can not find this product near you',
                    ];
                }
                if($isFailed == false){
                    $data = [
                        'product' => $product,
                        'pharmacies' => $pharmacies_response,
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

    public function webShowAll(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        $keywords_response = [];
        $products_response = [];

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }

        if($isFailed == false){
            $city_id = $user -> city_id;
            $pharmacies = User::where('city_id', $city_id)->where('role_id', '2')->get();

            if($pharmacies != []){
                foreach($pharmacies as $pharmacy){
                    $pharma_id = $pharmacy -> id;
                    $pharma = Pharmacy::where('user_id', $pharma_id)->first();
                    if($pharma != null){
                        $pharma_id =  $pharma -> id;
                        $products_pharmacy = ProductPharmacy::where('pharmacy_id', $pharma_id)->get();

                        if($products_pharmacy != []){
                            foreach($products_pharmacy as $pro){
                                $product_id = $pro -> product_id;

                                $product = Product::find($product_id);
                                //description
                                $descrption = $product -> description ;
                                $image_id = $product -> image_id;
                                $image = Image::where('id', $image_id)->first();

                                if($image != null){
                                    $image_path = $image -> path;
                                }
                                else{
                                    $image_path = null;
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
                                    'description'  => $descrption
                                ];

                                $products_response[] = $final_product;
                            }
                        }
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

    public function webShowOne(Request $request){
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
            $product_id = $request -> id;
            $pro = Product::where('id', $product_id)->first();
            if($pro == null){
                $isFailed = true;
                $errors[] = [
                    'error' => 'can not find this product'
                ];
            }
            else{
                $image_id = $pro -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = $image -> path;
                }
                else{
                    $image_path = null;
                }
                $city = City::find($user -> city_id);

                $delivery_fees = $city -> delivery_fees;

                $favourite = Favourite::where('user_id', $user -> id)->where('product_id', $product_id)->first();
                $isFav = false;
                if($favourite != null){
                    $isFav = true;
                }

                $product = [
                    'id' => $product_id,
                    'name' => $pro -> name,
                    'image' => $image_path,
                    'description' => $pro -> description,
                    'price' => $pro -> price,
                    'delivery_fees' => $delivery_fees,
                    'user_address' => $user -> address,
                    'is_favourite' => $isFav,
                ];

                // get the pharmacies that has this product and exist in my city
                $pharmacies_product = ProductPharmacy::where('product_id', $product_id)->get();
                if($pharmacies_product -> isEmpty()){
                    $isFailed = true;
                    $errors[] = [
                        'error' => 'can not find this product in a pharmacy'
                    ];
                }
                else{
                    $pharmacies_response = [];
                    // echo $pharmacies_product;
                    foreach($pharmacies_product as $pharmacy_product){
                        $pharmacy_id = $pharmacy_product -> pharmacy_id;
                        $pharmacies = Pharmacy::where('id', $pharmacy_id)->first();
                        $pharmacy_userid = $pharmacies -> user_id;
                        $pharmacy = User::where(['id' => $pharmacy_userid, 'city_id' => $user -> city_id])->first();

                        if($pharmacy == null){

                        }
                        else{
                            $image_id = $pharmacy -> image_id;
                            $image = Image::where('id', $image_id)->first();
                            if($image != null){
                                $image_path = $image -> path;
                            }
                            else{
                                $image_path = null;
                            }
                            //ratings
                            $overall_rating = 0;
                            $orders = Order::where('pharmacy_id', $pharmacy_id)->get();
                            $orders_count = Order::where('pharmacy_id', $pharmacy_id)->count();
                            $ratings = [];
                            if($orders == null || $orders_count == 0){
                                // continue
                            }
                            else{
                                foreach($orders as $order)
                                {
                                    $order_id = $order -> id;
                                    $rating = PharmacyRating::where('order_id', $order_id)->first();
                                    if($rating == null){
                                        continue;
                                    }
                                    else
                                    {
                                        $rate += $rating -> rating ;
                                    }
                                }
                                $overall_rating = $rate / $orders_count;
                            }

                            // buid response for each pharmacy
                            $pharma = [
                                'id' => $pharmacy -> id,
                                'name' => $pharmacy -> full_name,
                                'address' => $pharmacies -> address,
                                'image' => $image_path,
                                'overall_rating' => $overall_rating,
                                'city_id' => $pharmacy -> city_id,
                                'product_pharmacy_id' => $pharmacy_product -> id,
                            ];
                            $pharmacies_response[] = $pharma;
                        }
                    }
                }
                if($pharmacies_response == null){
                    $isFailed = true;
                    $errors += [
                        'error' => 'can not find this product near you',
                    ];
                }
                if($isFailed == false){
                    $data = [
                        'product' => $product,
                        'pharmacies' => $pharmacies_response,
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
