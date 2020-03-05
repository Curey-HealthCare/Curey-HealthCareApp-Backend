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
             $errors []  = [ 'auth' => 'authentication failed'];
         }
         if ($isFailed == false){
            $pharmacies = Pharmacy::where('user_id' ,$user -> id)->get();
            $pharmacy = [];
            $pharmacy_response = [];
            if($pharmacies->isEmpty()){
                $isFailed = true;
                $errors[] = ['error' => 'no orders yet'];
             }
             else{
                foreach($pharmacies as $phar)
                {
                    //id of pharmacy 
                    $pharm_id = $phar -> id;
                    //$pharm = Pharmacy::where('user_id',$pharm_id)->first();
                    //name of pharmacy
                    $Uid = $phar -> user_id;
                    $ph_name = User::find($Uid);
                    //pharmacy image 
                    $image_id = $ph_name -> image_id;
                    $image = Image::where('id', $image_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    $ph_address = $phar -> address ; 
                     //response
                    $pharmacy = [
                        'id'=> $pharm_id,
                        'name'=> $ph_name,
                        'image'=> $image_path,
                        'address'=> $ph_address
                    ];
                    $pharmacy_response []= $pharmacy;
                    $orders = Order::where('pharmacy_id',$pharm_id)->get();
                    $order_response = []; 
                    foreach($orders as $order)
                    {
                     //id of the order 
                      $order_id = $order -> id ;
                      $ord = OrderDetail::where('order_id',$order_id)->first();
                      //amount 
                      $amount = $ord -> amount ;
                      //id of product
                      $pro_id = $ord -> product_id;
                      $product = Product::where('id',$pro_id)->first();
                      //product name 
                      $pro_name = $product -> name;
                      $pro_price = $product -> price;
                      $total_price = $amount * $pro_price;

                      $order_response = [
                          'order_id'=> $order_id,
                          'product_id'=> $pro_id,
                          'name'=> $pro_name,
                          'total_price'=> $total_price
                      ];

                    }

                }

             }
             $data = [
                'pharmacy' => $pharmacy_response,
                'order' => $order_response
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
