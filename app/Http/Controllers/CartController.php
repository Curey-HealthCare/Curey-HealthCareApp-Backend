<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\ProductPharmacy;
use App\Cart;

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
                    // option 1 : send to update and increase the amount
                    // option 2 : send an error message
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
