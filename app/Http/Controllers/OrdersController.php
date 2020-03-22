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
                }
                if($isFailed == false){
                    $data = [
                        'orders' => $orders_response
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

    public function mobileSubmit(Request $request){
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
        else{
            $products_pharmacies = $request -> products;
            if($products_pharmacies == []){
                $isFailed = true;
                $errors += [
                    'error' => 'there are no products in the order',
                ];
            }
            else{
                $pharmacies = [];
                foreach($products_pharmacies as $product_pharmacy){
                    $pharmacy_id_request = $product_pharmacy['id'];
                    $pharmacy_id = ProductPharmacy::select('pharmacy_id')->where('id', $pharmacy_id_request)->first()-> pharmacy_id;
                    // echo $pharmacy_id;
                    if(in_array($pharmacy_id, $pharmacies)){
                        continue;
                    }
                    else{
                        $pharmacies[] = $pharmacy_id;
                    }
                }
                // $data = $pharmacies;
                $order = null;
                for($i = 0; $i < count($pharmacies); $i++){
                    $user_id = $user -> id;
                    $products = [];
                    $order = new Order;
                    $order -> pharmacy_id = $pharmacy_id;
                    $order -> user_id = $user_id;
                    $order -> delivery_type = 1;
                    $order -> save();
                    $products = [];
                    foreach ($products_pharmacies as $product_pharmacy) {
                        $pharmacy_id_request = $product_pharmacy['id'];
                        $pharmacy_id = ProductPharmacy::select('pharmacy_id')->where('id', $pharmacy_id_request)->first()-> pharmacy_id;
                        if($pharmacy_id == $pharmacies[$i]){
                            $product_id = ProductPharmacy::select('product_id')->where('id', $pharmacy_id_request)->first()-> product_id;
                            $amount = $product_pharmacy['amount'];
                            $product = [
                                'id' => $product_id,
                                'amount' => $amount,
                            ];
                            $products[] = $product;
                        }
                        else{
                            continue;
                        }
                    }
                    foreach($products as $pro){
                        $order_detail = new OrderDetail;
                        $order_detail -> order_id = $order -> id;
                        $order_detail -> product_id = $pro['id'];
                        $order_detail -> amount = $pro['amount'];
                        $order_detail -> save();
                    }
                }
                $data += [
                    'success' => 'your orders have been sent'
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
                if($isFailed == false){
                    $data = [
                        'orders' => $orders_response
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

    public function webSubmit(Request $request){
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
        else{
            $products_pharmacies = $request -> products;
            if($products_pharmacies == []){
                $isFailed = true;
                $errors += [
                    'error' => 'there are no products in the order',
                ];
            }
            else{
                $pharmacies = [];
                foreach($products_pharmacies as $product_pharmacy){
                    $pharmacy_id_request = $product_pharmacy['id'];
                    $pharmacy_id = ProductPharmacy::select('pharmacy_id')->where('id', $pharmacy_id_request)->first()-> pharmacy_id;
                    // echo $pharmacy_id;
                    if(in_array($pharmacy_id, $pharmacies)){
                        continue;
                    }
                    else{
                        $pharmacies[] = $pharmacy_id;
                    }
                }
                // $data = $pharmacies;
                $order = null;
                for($i = 0; $i < count($pharmacies); $i++){
                    $user_id = $user -> id;
                    $products = [];
                    $order = new Order;
                    $order -> pharmacy_id = $pharmacy_id;
                    $order -> user_id = $user_id;
                    $order -> delivery_type = 1;
                    $order -> save();
                    $products = [];
                    foreach ($products_pharmacies as $product_pharmacy) {
                        $pharmacy_id_request = $product_pharmacy['id'];
                        $pharmacy_id = ProductPharmacy::select('pharmacy_id')->where('id', $pharmacy_id_request)->first()-> pharmacy_id;
                        if($pharmacy_id == $pharmacies[$i]){
                            $product_id = ProductPharmacy::select('product_id')->where('id', $pharmacy_id_request)->first()-> product_id;
                            $amount = $product_pharmacy['amount'];
                            $product = [
                                'id' => $product_id,
                                'amount' => $amount,
                            ];
                            $products[] = $product;
                        }
                        else{
                            continue;
                        }
                    }
                    foreach($products as $pro){
                        $order_detail = new OrderDetail;
                        $order_detail -> order_id = $order -> id;
                        $order_detail -> product_id = $pro['id'];
                        $order_detail -> amount = $pro['amount'];
                        $order_detail -> save();
                    }
                }
                $data += [
                    'success' => 'your orders have been sent'
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
