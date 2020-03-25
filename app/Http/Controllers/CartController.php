<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\ProductPharmacy;
use App\Cart;
use App\Product;
use App\Pharmacy;
use App\Image;

class CartController extends Controller
{
    // Mobile Functions
    public function mobileCreate(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $product = $request -> product;
            if($product == null){
                $isFailed = true;
                $errors += [
                    'error' => 'can not register an empty product'
                ];
            }
            else{
                $item_id = $product['id'];
                $existing = Cart::where(['user_id' => $user -> id, 'product_id' => $item_id])->get();
                if($existing -> isEmpty()){
                    $cart_item = new Cart;
                    $cart_item -> user_id = $user -> id;
                    $cart_item -> product_id = $product['id'];
                    $cart_item -> amount = $product['amount'];

                    $cart_item -> save();
                    $data += [
                        'success' => 'item added to cart'
                    ];
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'this item already exists in your cart'
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
    public function mobileRead(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $cart_items = Cart::where('user_id', $user -> id)->get();
            if($cart_items -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'error' => 'you do not have any items'
                ];
            }
            else{
                // get details about each item in the cart
                $products = [];
                foreach($cart_items as $item){
                    $product_pharmacy_id = $item -> id;
                    $amount = $item -> amount;
                    $product = null;
                    // get product id and pharmacy id
                    $product_pharmacy = ProductPharmacy::where('id', $product_pharmacy_id)->first();
                    if($product_pharmacy == null){
                        $isFailed = true;
                        $errors += [
                            'error' => 'can not retrieve item data'
                        ];
                    }
                    else{
                        $product_id = $product_pharmacy -> product_id;
                        $pharmacy_id = $product_pharmacy -> pharmacy_id;
                        // get all product information
                        $product = Product::where('id', $product_id)->first();
                        if($product != null){

                        }
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
    public function mobileUpdate(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{

        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function mobileDelete(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{

        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
}
