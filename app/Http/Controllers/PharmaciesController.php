<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
use App\OrderDetail;
use App\OrderTracking;
use App\KeywordsSearch;
use App\Favourite;


class PharmaciesController extends Controller
{
    public function WebPharmacyDashboard(Request $request){

        //authentication
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 2])->first();

        // Needed Variables
        $overall_rating = 0;
        $no_of_reviews = 0;
        $image_pharmacy = null;
        $performed = [];

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $pharmacy_id = $user -> id;
            $pharmacy = Pharmacy::where('user_id', $pharmacy_id)->first();

            if($pharmacy == null)
            {
                $isFailed = true;
                $errors += [
                    'error' => 'can not retrieve data'
                ];
            }
            else
            {
                $pharma = [];
                // get pharmacy image
                $image_id = $user -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null){
                    $image_path = Storage::url($image -> path . '.' .$image -> extension);
                    $image_url = asset($image_path);
                }
                else{
                    $image_url = asset(Storage::url('default/pharmacy.png'));
                }
                // get pharmacy overall rating and reviews
                $ratings = 0;
                $orders = Order::where('pharmacy_id', $pharmacy -> id)->get();
                if($orders -> isNotEmpty()){
                    foreach($orders as $order){
                        $review = PharmacyRating::where('order_id', $order -> id)->first();
                        if($review != null){
                            $ratings += $review -> rating;
                            $no_of_reviews += 1;
                        }
                    }
                    $overall_rating = $ratings / $no_of_reviews;

                    // get performed orders
                    foreach($orders as $order){
                        $order_tracking = OrderTracking::where(['order_id' => $order -> id])->first();
                        if($order_tracking != null){
                            if($order_tracking -> is_delivered == 1){
                                // get the order details

                                $order_data = [];
                                $items = [];
                                $order_details = OrderDetail::where('order_id', $order -> id)->get();
                                if($order_details -> isNotEmpty()){
                                    foreach($order_details as $order_product){
                                        $product = Product::where('id', $order_product -> product_id)->first();
                                        $product_image = null;
                                        $p_image = Image::where('id', $product -> image_id)->first();
                                        if($p_image != null){
                                            $image_path = Storage::url($p_image -> path . '.' .$p_image -> extension);
                                            $product_image = asset($image_path);
                                        }
                                        else{
                                            $product_image = asset(Storage::url('default/product.png'));
                                        }
                                        $item = [
                                            'product' => $product -> name,
                                            'image' => $product_image,
                                            'amount' => $order_product -> amount,
                                        ];
                                        $items[] = $item;
                                    }
                                    $order_user = User::where('id', $order -> user_id)->first();
                                    $user_image = null;
                                    $u_image = Image::where('id', $order_user -> image_id)->first();
                                    if($u_image != null){
                                        $image_path = Storage::url($u_image -> path . '.' .$u_image -> extension);
                                        $user_image = asset($image_path);
                                    }
                                    else{
                                        $user_image = asset(Storage::url('default/user.png'));
                                    }
                                    $order_data = [
                                        'buyer' => $order_user -> full_name,
                                        'address' => $order_user -> address,
                                        'image' => $user_image,
                                        'details' => $items
                                    ];

                                    $preformed[] = $order_data;
                                }
                            }
                        }
                    }
                }

                $pharma = [
                    'name' => $user -> full_name,
                    'image' => $image_url,
                    'address' => $pharmacy -> address,
                    'rating' => $overall_rating,
                    'reviews_count' => $no_of_reviews,
                ];

            }
        }


        if($isFailed == false){
            $data = [
                'pharmacy' => $pharma,
                'performed' => $performed
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }


    public function webStock(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 2])->first();

        // needed variables
        $ph_stock = [];

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{

            $pharmacy_id = $user -> id;
            $pharmacy = Pharmacy::where('user_id',$pharmacy_id)->first();

            if($pharmacy == null)
            {
                $isFailed = true;
                $errors += [
                    'error' => 'can not retrieve data'
                ];
            }
            else
            {
                // get the pharmacy stock
                $stock = ProductPharmacy::where('pharmacy_id', $pharmacy -> id)->get();
                if($stock -> isNotEmpty()){
                    foreach($stock as $item){
                        $product = Product::where('id', $item -> product_id)->first();
                        $ph_stock[] = [
                            'name' => $product -> name,
                            'amount' => $item -> count,
                            'price' => $product -> price,
                        ];
                    }
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'no stock available in database'
                    ];
                }
            }

        }

        if($isFailed == false){
            $data = $ph_stock;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }



    public function WebRequests(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 2])->first();

        // needed variables
        $requests = [];

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $pharmacy_id = $user -> id;
            $pharmacy = Pharmacy::where('user_id',$pharmacy_id)->first();
            if($pharmacy != null){
                $orders = Order::where('pharmacy_id', $pharmacy -> id)->get();
                if($orders -> isNotEmpty()){
                    // get new orders
                    foreach($orders as $order){
                        $order_tracking = OrderTracking::where(['order_id' => $order -> id])->first();
                        if($order_tracking != null){
                            if($order_tracking -> is_accepted == 0 || $order_tracking -> is_accepted == null){
                                // get the order details
                                $order_data = [];
                                $items = [];
                                $order_details = OrderDetail::where('order_id', $order -> id)->get();
                                if($order_details -> isNotEmpty()){
                                    foreach($order_details as $order_product){
                                        $product = Product::where('id', $order_product -> product_id)->first();
                                        $product_image = null;
                                        $p_image = Image::where('id', $product -> image_id)->first();
                                        if($p_image != null){
                                            $image_path = Storage::url($p_image -> path . '.' .$p_image -> extension);
                                            $product_image = asset($image_path);
                                        }
                                        else{
                                            $product_image = asset(Storage::url('default/product.png'));
                                        }
                                        $item = [
                                            'product' => $product -> name,
                                            'image' => $product_image,
                                            'amount' => $order_product -> amount,
                                        ];
                                        $items[] = $item;
                                    }
                                    $order_user = User::where('id', $order -> user_id)->first();
                                    $user_image = null;
                                    $u_image = Image::where('id', $order_user -> image_id)->first();
                                    if($u_image != null){
                                        $image_path = Storage::url($u_image -> path . '.' .$u_image -> extension);
                                        $user_image = asset($image_path);
                                    }
                                    else{
                                        $user_image = asset(Storage::url('default/user.png'));
                                    }
                                    $order_data = [
                                        'id' => $order -> id,
                                        'buyer' => $order_user -> full_name,
                                        'address' => $order_user -> address,
                                        'image' => $user_image,
                                        'details' => $items,
                                        'timestamp' => $order -> created_at,
                                    ];

                                    $requests[] = $order_data;
                                }
                            }
                        }
                    }
                }
            }
        }

        if($isFailed == false){
            $data = $requests;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webAcceptRequest(Request $request){
         //authentication
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 2])->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }

        else{
            $order_id = $request -> order_id;
            OrderTracking::where('order_id', $order_id)
                ->update(['is_accepted' => 1, 'accepted_at' => Carbon::now()]);
            $data += [
                'success' => 'order accepted'
            ];
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);

    }

    public function webPackingList(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 2])->first();

        // needed variables
        $list = [];

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $pharmacy_id = $user -> id;
            $pharmacy = Pharmacy::where('user_id',$pharmacy_id)->first();
            if($pharmacy == null)
            {
                $isFailed = true;
                $errors += [
                    'error' => 'can not retrieve data'
                ];
            }
            else{
                $orders = Order::where('pharmacy_id', $pharmacy -> id)->get();
                if($orders -> isNotEmpty()){
                    // get new orders
                    foreach($orders as $order){
                        $order_tracking = OrderTracking::where(['order_id' => $order -> id])->first();
                        if($order_tracking != null){
                            if($order_tracking -> is_accepted == 1){
                                // get the order details
                                $order_data = [];
                                $items = [];
                                $order_details = OrderDetail::where('order_id', $order -> id)->get();
                                if($order_details -> isNotEmpty()){
                                    foreach($order_details as $order_product){
                                        $product = Product::where('id', $order_product -> product_id)->first();
                                        $product_image = null;
                                        $p_image = Image::where('id', $product -> image_id)->first();
                                        if($p_image != null){
                                            $image_path = Storage::url($p_image -> path . '.' .$p_image -> extension);
                                            $product_image = asset($image_path);
                                        }
                                        else{
                                            $product_image = asset(Storage::url('default/product.png'));
                                        }
                                        $item = [
                                            'product' => $product -> name,
                                            'image' => $product_image,
                                            'amount' => $order_product -> amount,
                                        ];
                                        $items[] = $item;
                                    }
                                    $order_user = User::where('id', $order -> user_id)->first();
                                    $user_image = null;
                                    $u_image = Image::where('id', $order_user -> image_id)->first();
                                    if($u_image != null){
                                        $image_path = Storage::url($u_image -> path . '.' .$u_image -> extension);
                                        $user_image = asset($image_path);
                                    }
                                    else{
                                        $user_image = asset(Storage::url('default/user.png'));
                                    }
                                    $order_data = [
                                        'id' => $order -> id,
                                        'buyer' => $order_user -> full_name,
                                        'address' => $order_user -> address,
                                        'image' => $user_image,
                                        'details' => $items,
                                        'timestamp' => $order -> created_at,
                                    ];

                                    $list[] = $order_data;
                                }
                            }
                        }
                    }
                }
            }

        }
        if($isFailed == false){
            $data = $list;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webOrderReady(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 2])->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $order_id = $request -> order_id;
            OrderTracking::where('order_id', $order_id)
                ->update(
                    [
                        'is_prepared' => 1,
                        'prepared_at' => Carbon::now(),
                        'is_ofd' => 1,
                        'ofd_at' => Carbon::now()
                    ]);
            $data += [
                'success' => 'order ready for delivery'
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
