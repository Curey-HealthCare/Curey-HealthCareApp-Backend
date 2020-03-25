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

        $products = [];

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
                            // get the pharmacy
                            $pharmacy = Pharmacy::where('id', $pharmacy_id)->first();
                            if($pharmacy != null){
                                // get pharmacy name
                                $pharmacy_user = User::where('id', $pharmacy -> user_id)->first();
                                if($pharmacy_user != null){
                                    // get all needed data and build response object
                                    // pharmacy image
                                    $p_image = Image::where('id', $pharmacy_user -> image_id)->first();
                                    $p_image_path = null;
                                    if($p_image != null){
                                        $p_image_path = $p_image -> path;
                                    }

                                    $pharmacy_obj = [
                                        'name' => $pharmacy_user -> full_name,
                                        'address' => $pharmacy -> address,
                                        'image' => $p_image_path,
                                    ];

                                    // get product image and details
                                    $image = Image::where('id', $product -> image_id)->first();
                                    $image_path = null;
                                    if($image != null){
                                        $image_path = $image -> path;
                                    }
                                    $product_obj = [
                                        'name' => $product -> name,
                                        'price' => $product -> price,
                                        'amount' => $amount,
                                        'image' => $image_path,
                                        'pharmacy' => $pharmacy_obj
                                    ];

                                }$products[] = $product_obj;
                            }
                        }
                    }
                }
            }
        }
        if($isFailed == false){
            $data = $products;
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
            $product = $request -> product;
            if($product == null){
                $isFailed = true;
                $errors += [
                    'error' => 'can not update an empty product'
                ];
            }
            else{
                Cart::where(['user_id' => $user -> id, 'product_id' => $product['id']])->update(['amount' => $product['amount']]);
                $data += [
                    'success' => 'updated successfully'
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
            $product_id = $request -> product_id;
            if($product_id == null){
                $isFailed = true;
                $errors += [
                    'error' => 'can not delete a non existing cart item'
                ];
            }
            else{
                Cart::where(['user_id' => $user -> id, 'product_id' => $product_id])->delete();
                $data += [
                    'success' => 'deleted successfully'
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

    // web functions
    public function webCreate(Request $request){
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
    public function webRead(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $products = [];

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
                            // get the pharmacy
                            $pharmacy = Pharmacy::where('id', $pharmacy_id)->first();
                            if($pharmacy != null){
                                // get pharmacy name
                                $pharmacy_user = User::where('id', $pharmacy -> user_id)->first();
                                if($pharmacy_user != null){
                                    // get all needed data and build response object
                                    // pharmacy image
                                    $p_image = Image::where('id', $pharmacy_user -> image_id)->first();
                                    $p_image_path = null;
                                    if($p_image != null){
                                        $p_image_path = $p_image -> path;
                                    }

                                    $pharmacy_obj = [
                                        'name' => $pharmacy_user -> full_name,
                                        'address' => $pharmacy -> address,
                                        'image' => $p_image_path,
                                    ];

                                    // get product image and details
                                    $image = Image::where('id', $product -> image_id)->first();
                                    $image_path = null;
                                    if($image != null){
                                        $image_path = $image -> path;
                                    }
                                    $product_obj = [
                                        'name' => $product -> name,
                                        'price' => $product -> price,
                                        'amount' => $amount,
                                        'image' => $image_path,
                                        'pharmacy' => $pharmacy_obj
                                    ];

                                }$products[] = $product_obj;
                            }
                        }
                    }
                }
            }
        }
        if($isFailed == false){
            $data = $products;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webUpdate(Request $request){
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
                    'error' => 'can not update an empty product'
                ];
            }
            else{
                Cart::where(['user_id' => $user -> id, 'product_id' => $product['id']])->update(['amount' => $product['amount']]);
                $data += [
                    'success' => 'updated successfully'
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
    public function webDelete(Request $request){
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
            $product_id = $request -> product_id;
            if($product_id == null){
                $isFailed = true;
                $errors += [
                    'error' => 'can not delete a non existing cart item'
                ];
            }
            else{
                Cart::where(['user_id' => $user -> id, 'product_id' => $product_id])->delete();
                $data += [
                    'success' => 'deleted successfully'
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
