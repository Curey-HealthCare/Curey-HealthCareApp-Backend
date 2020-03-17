<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Favourite;
use App\Product;
use App\Image;

class FavouritesController extends Controller
{
    //for mobile
    public function mobileAddFavourite(Request $request){
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
        else{
            $favExist = Favourite::where('user_id', $user -> id)->where('product_id', $request -> product_id)->first();
            if($favExist == null){
                $product_id = $request -> product_id;
                $favourite = new Favourite;
                $favourite -> user_id = $user -> id;
                $favourite -> product_id = $product_id;
                $favourite -> save();

                $data += [
                    'message' => 'added to favourites',
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'error' => 'already in favourites',
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

    public function mobileDeleteFavourite(Request $request){
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
        else{
            $product_id = $request -> product_id;

            $favExist = Favourite::where('user_id', $user -> id)->where('product_id', $request -> product_id)->first();
            if($favExist != null){
                Favourite::where('user_id', $user -> id)->where('product_id', $product_id)->delete();

                $data += [
                    'message' => 'removed from favourites',
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'error' => 'this item is not in your favourites',
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

    public function mobileShowFavourites(Request $request){
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
        else{
            $user_favourites = Favourite::where('user_id', $user -> id)->get();
            if($user_favourites -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'message' => 'you do not have favourites',
                ];
            }
            else{
                $products_response = [];
                foreach($user_favourites as $fav){
                    $product_id = $fav -> product_id;

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

                    $products_response[] = $final_product;
                }
                $data[] = $products_response;
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

    public function webAddFavourite(Request $request){
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
        else{
            $favExist = Favourite::where('user_id', $user -> id)->where('product_id', $request -> product_id)->first();
            if($favExist == null){
                $product_id = $request -> product_id;
                $favourite = new Favourite;
                $favourite -> user_id = $user -> id;
                $favourite -> product_id = $product_id;
                $favourite -> save();

                $data += [
                    'message' => 'added to favourites',
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'error' => 'already in favourites',
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

    public function webDeleteFavourite(Request $request){
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
        else{
            $product_id = $request -> product_id;
            $favExist = Favourite::where('user_id', $user -> id)->where('product_id', $request -> product_id)->first();
            if($favExist != null){
                Favourite::where('user_id', $user -> id)->where('product_id', $product_id)->delete();

                $data += [
                    'message' => 'removed from favourites',
                ];
            }
            else{
                $isFailed = true;
                $errors += [
                    'error' => 'this item is not in your favourites',
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

    public function webShowFavourites(Request $request){
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
        else{
            $user_favourites = Favourite::where('user_id', $user -> id)->get();
            if($user_favourites -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'message' => 'you do not have favourites',
                ];
            }
            else{
                $products_response = [];
                foreach($user_favourites as $fav){
                    $product_id = $fav -> product_id;

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
                        'price' => $product -> price,
                        'description'  => $product -> descrption
                    ];

                    $products_response[] = $final_product;
                }
                $data[] = $products_response;
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
