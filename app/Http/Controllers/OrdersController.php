<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Pharmacy;
use App\Product;
use App\ProductPharmacy;
use App\Image;
use App\UserRole;

class OrdersController extends Controller
{
    public function mobileShowOrders(Request $request)
    {
         //authenticated user
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
            // $pharmacies = Pharmacy::where('user_id' ,$user -> id)->get();
            $orders = Order::where('user_id', $user -> id)->get();
            // $pharmacy_response = [];
            if($orders -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'error' => 'no orders yet'
                ];
            }
            else{
                $order_response = [];
                $orders_response = [];
                foreach($orders as $order)
                {
                    // id of the order
                    $order_id = $order -> id ;
                    $order_details = OrderDetail::where('order_id',$order_id)->get();
                    if($order_details -> isEmpty()){
                        $isFailed = true;
                        $errors += [
                            'error' => 'problem getting order details'
                        ];
                    }
                    else{
                        $total_price = 0;
                        $order_products = [];
                        foreach($order_details as $product){
                            $product_id = $product -> product_id;
                            $product_data = Product::find($product_id);
                            // get the price
                            $product_price = $product_data -> price;
                            // product name
                            $product_name = $product_data -> name;
                            // amount of the product
                            $amount = $product -> amount;
                            // calculate the price
                            $total_price += ($product_price * $amount);

                            $order_products[] = [
                                'name' => $product_name,
                                'amount' => $amount
                            ];
                        }
                        // get the pharmacy name & photo
                        $pharmacy_id = $order -> pharmacy_id;
                        $pharmacy = Pharmacy::find($pharmacy_id);
                        $pharmacy_user = User::find($pharmacy -> user_id);
                        $image_id = $pharmacy_user -> image_id;
                        $image = Image::where('id',$image_id)->first();
                        if($image != null){
                            $image_path = $image -> path;
                        }
                        else{
                            $image_path = null;
                        }
                        $order_response = [
                            'id' => $order_id,
                            'pharmacy' => $pharmacy_user -> full_name,
                            'image' => $image_path,
                            'total_price' => $total_price,
                            'products' => $order_products
                        ];
                        $orders_response[] = $order_response;
                    }
                    // Build Order Response
                    // //id of pharmacy
                    // $pharm_id = $phar -> id;
                    // //$pharm = Pharmacy::where('user_id',$pharm_id)->first();
                    // //name of pharmacy
                    // $Uid = $phar -> user_id;
                    // $ph_name = User::find($Uid);
                    // //pharmacy image
                    // $image_id = $ph_name -> image_id;
                    // $image = Image::where('id', $image_id)->first();
                    // if($image != null){
                    //     $image_path = $image -> path;
                    // }
                    // else{
                    //     $image_path = null;
                    // }
                    // $ph_address = $phar -> address ;
                    //     //response
                    // $pharmacy = [
                    //     'id'=> $pharm_id,
                    //     'name'=> $ph_name,
                    //     'image'=> $image_path,
                    //     'address'=> $ph_address
                    // ];
                    // $pharmacy_response []= $pharmacy;
                    // $orders = Order::where('pharmacy_id',$pharm_id)->get();
                    // $order_response = [];
                    // foreach($orders as $order)
                    // {
                    //     //id of the order
                    //     $order_id = $order -> id ;
                    //     $ord = OrderDetail::where('order_id',$order_id)->first();
                    //     //amount
                    //     $amount = $ord -> amount ;
                    //     //id of product
                    //     $pro_id = $ord -> product_id;
                    //     $product = Product::where('id',$pro_id)->first();
                    //     //product name
                    //     $pro_name = $product -> name;
                    //     $pro_price = $product -> price;
                    //     $total_price = $amount * $pro_price;

                    //     $order_response = [
                    //         'order_id'=> $order_id,
                    //         'product_id'=> $pro_id,
                    //         'name'=> $pro_name,
                    //         'total_price'=> $total_price
                    //     ];
                    // }
                }
                $data = [
                    'orders' => $orders_response
                ];
            }
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webShowOrders(Request $request)
    {
         //authenticated user
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
            // $pharmacies = Pharmacy::where('user_id' ,$user -> id)->get();
            $orders = Order::where('user_id', $user -> id)->get();
            // $pharmacy_response = [];
            if($orders -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'error' => 'no orders yet'
                ];
            }
            else{
                $order_response = [];
                $orders_response = [];
                foreach($orders as $order)
                {
                    // id of the order
                    $order_id = $order -> id ;
                    $order_details = OrderDetail::where('order_id',$order_id)->get();
                    if($order_details -> isEmpty()){
                        $isFailed = true;
                        $errors += [
                            'error' => 'problem getting order details'
                        ];
                    }
                    else{
                        $total_price = 0;
                        $order_products = [];
                        foreach($order_details as $product){
                            $product_id = $product -> product_id;
                            $product_data = Product::find($product_id);
                            // get the price
                            $product_price = $product_data -> price;
                            // product name
                            $product_name = $product_data -> name;
                            // amount of the product
                            $amount = $product -> amount;
                            // calculate the price
                            $total_price += ($product_price * $amount);

                            $order_products[] = [
                                'name' => $product_name,
                                'amount' => $amount
                            ];
                        }
                        // get the pharmacy name & photo
                        $pharmacy_id = $order -> pharmacy_id;
                        $pharmacy = Pharmacy::find($pharmacy_id);
                        $pharmacy_user = User::find($pharmacy -> user_id);
                        $image_id = $pharmacy_user -> image_id;
                        $image = Image::where('id',$image_id)->first();
                        if($image != null){
                            $image_path = $image -> path;
                        }
                        else{
                            $image_path = null;
                        }
                        $order_response = [
                            'id' => $order_id,
                            'pharmacy' => $pharmacy_user -> full_name,
                            'image' => $image_path,
                            'total_price' => $total_price,
                            'products' => $order_products
                        ];
                        $orders_response[] = $order_response;
                    }
                }
                $data = [
                    'orders' => $orders_response
                ];
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
