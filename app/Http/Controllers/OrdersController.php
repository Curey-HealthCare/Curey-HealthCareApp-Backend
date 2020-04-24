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
use App\OrderTracking;
use App\Cart;

class OrdersController extends Controller
{
    public function mobileShowOrders(Request $request)
    {
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
            $orders = Order::where('user_id', $user -> id)->get();
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
                    $order_id = $order -> id ;
                    $order_details = OrderDetail::where('order_id',$order_id)->orderBy('id', 'desc')->get();
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
                            $product_price = $product_data -> price;
                            $product_name = $product_data -> name;
                            $amount = $product -> amount;
                            $total_price += ($product_price * $amount);
                            $order_products[] = [
                                'name' => $product_name,
                                'amount' => $amount,
                                'price' => $product_price,
                            ];
                        }
                        $pharmacy_id = $order -> pharmacy_id;
                        $pharmacy = Pharmacy::find($pharmacy_id);
                        $pharmacy_user = User::find($pharmacy -> user_id);
                        $image_id = $pharmacy_user -> image_id;
                        $image = Image::where('id',$image_id)->first();
                        if($image != null){
                            $image_path = $image -> path;
                        }
                        else{
                            $image_path = "default/pharmacy.png";
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
//            check the address of the user
            if($user -> address == null){
                $isFailed = true;
                $errors += [
                    'address' => 'you should first set your address'
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
                    $order_address = $user -> address;
//                    see if user is ordering to a different address
                    if($request -> address != null){
                        if($request -> permenant == 1){
                            $order_address = $request -> address;
//                            update the user's address with the new address
                            User::where('id', $user -> id)->update(['address' => $request -> address]);
                        }
                        else{
                            $order_address = $request -> address;
                        }
                    }
                    $pharmacies = [];
                    foreach($products_pharmacies as $product_pharmacy){
//                        check the available ammount of each product in the order
                        $pharmacy_id_request = $product_pharmacy['id'];
                        $the_pharmacy = ProductPharmacy::select('pharmacy_id')->where('id', $pharmacy_id_request)->first();
                        if($the_pharmacy -> count < $product_pharmacy['amount']){
                            $isFailed = true;
                            $errors += [
                                'stock' => 'the amount you ordered is not available'
                            ];
                            break;
                        }
                        $pharmacy_id = $the_pharmacy -> pharmacy_id;
                        if(in_array($pharmacy_id, $pharmacies)){
                            continue;
                        }
                        else{
                            $pharmacies[] = $pharmacy_id;
                        }
                    }
                    $order = null;
                    if($isFailed == false){
                        for($i = 0; $i < count($pharmacies); $i++){
                            $user_id = $user -> id;
                            $products = [];
                            $order = new Order;
                            $order -> pharmacy_id = $pharmacy_id;
                            $order -> user_id = $user_id;
                            $order -> address = $order_address;
                            $order -> delivery_type = 1;
                            if($order -> save()){
                                $order_tracking = new OrderTracking;
                                $order_tracking -> user_id = $user -> id;
                                $order_tracking -> order_id = $order -> id;
                                $order_tracking -> save();
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
                        }
                        foreach($products_pharmacies as $deproduct){
                            $product_id = $deproduct['id'];
                            Cart::where(['user_id' => $user -> id, 'product_id' => $product_id])->delete();
                            $existing = ProductPharmacy::find($product_id);
                            $remaining = $existing -> count - $deproduct['amount'];
                            ProductPharmacy::where('id', $product_id)->update(['count' => $remaining]);
                        }
                        $data += [
                            'success' => 'your orders have been sent'
                        ];
                    }
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

    public function mobileCancelOrder(Request $request){
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
            $order_id = $request -> order_id;
            $order_tracking = OrderTracking::where('order_id', $order_id)->first();
            if($order_tracking == null){
                OrderDetail::where(['order_id' => $order_id])->delete();
                Order::where('id', $order_id)->delete();
                $data += [
                    'success' => 'order cancelled successfully'
                ];
            }
            else{
                if($order_tracking -> is_accepted == 1){
                    $isFailed = true;
                    $errors += [
                        'error' => 'this order is getting prepared or out for delivery, can not be cancelled'
                    ];
                }
                else{
                    OrderDetail::where(['order_id' => $order_id])->delete();
                    OrderTracking::where('order_id', $order_id)->delete();
                    Order::where('id', $order_id)->delete();
                    $data += [
                        'success' => 'order cancelled successfully'
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

    public function webShowOrders(Request $request)
    {
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
            $orders = Order::where('user_id', $user -> id)->get();
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
                    $order_id = $order -> id ;
                    $order_details = OrderDetail::where('order_id',$order_id)->orderBy('id', 'desc')->get();
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
                            $product_price = $product_data -> price;
                            $product_name = $product_data -> name;
                            $amount = $product -> amount;
                            $total_price += ($product_price * $amount);
                            $order_products[] = [
                                'name' => $product_name,
                                'amount' => $amount,
                                'price' => $product_price,
                            ];
                        }
                        $pharmacy_id = $order -> pharmacy_id;
                        $pharmacy = Pharmacy::find($pharmacy_id);
                        $pharmacy_user = User::find($pharmacy -> user_id);
                        $image_id = $pharmacy_user -> image_id;
                        $image = Image::where('id',$image_id)->first();
                        if($image != null){
                            $image_path = $image -> path;
                        }
                        else{
                            $image_path = "default/pharmacy.png";
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
//            check the address of the user
            if($user -> address == null){
                $isFailed = true;
                $errors += [
                    'address' => 'you should first set your address'
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
                    $order_address = $user -> address;
//                    see if user is ordering to a different address
                    if($request -> address != null){
                        if($request -> permenant == 1){
                            $order_address = $request -> address;
//                            update the user's address with the new address
                            User::where('id', $user -> id)->update(['address' => $request -> address]);
                        }
                        else{
                            $order_address = $request -> address;
                        }
                    }
                    $pharmacies = [];
                    foreach($products_pharmacies as $product_pharmacy){
//                        check the available ammount of each product in the order
                        $pharmacy_id_request = $product_pharmacy['id'];
                        $the_pharmacy = ProductPharmacy::select('pharmacy_id')->where('id', $pharmacy_id_request)->first();
                        if($the_pharmacy -> count < $product_pharmacy['amount']){
                            $isFailed = true;
                            $errors += [
                                'stock' => 'the amount you ordered is not available'
                            ];
                            break;
                        }
                        $pharmacy_id = $the_pharmacy -> pharmacy_id;
                        if(in_array($pharmacy_id, $pharmacies)){
                            continue;
                        }
                        else{
                            $pharmacies[] = $pharmacy_id;
                        }
                    }
                    $order = null;
                    if($isFailed == false){
                        for($i = 0; $i < count($pharmacies); $i++){
                            $user_id = $user -> id;
                            $products = [];
                            $order = new Order;
                            $order -> pharmacy_id = $pharmacy_id;
                            $order -> user_id = $user_id;
                            $order -> address = $order_address;
                            $order -> delivery_type = 1;
                            if($order -> save()){
                                $order_tracking = new OrderTracking;
                                $order_tracking -> user_id = $user -> id;
                                $order_tracking -> order_id = $order -> id;
                                $order_tracking -> save();
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
                        }
                        foreach($products_pharmacies as $deproduct){
                            $product_id = $deproduct['id'];
                            Cart::where(['user_id' => $user -> id, 'product_id' => $product_id])->delete();
                            $existing = ProductPharmacy::find($product_id);
                            $remaining = $existing -> count - $deproduct['amount'];
                            ProductPharmacy::where('id', $product_id)->update(['count' => $remaining]);
                        }
                        $data += [
                            'success' => 'your orders have been sent'
                        ];
                    }
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

    public function webCancelOrder(Request $request){
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
            $order_id = $request -> order_id;
            $order_tracking = OrderTracking::where('order_id', $order_id)->first();
            if($order_tracking == null){
                OrderDetail::where(['order_id' => $order_id])->delete();
                Order::where('id', $order_id)->delete();
                $data += [
                    'success' => 'order cancelled successfully'
                ];
            }
            else{
                if($order_tracking -> is_accepted == 1){
                    $isFailed = true;
                    $errors += [
                        'error' => 'this order is getting prepared or out for delivery, can not be cancelled'
                    ];
                }
                else{
                    OrderDetail::where(['order_id' => $order_id])->delete();
                    OrderTracking::where('order_id', $order_id)->delete();
                    Order::where('id', $order_id)->delete();
                    $data += [
                        'success' => 'order cancelled successfully'
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
