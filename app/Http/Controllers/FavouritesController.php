<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Favourite;
use App\Product;
use App\Image;

class FavouritesController extends Controller
{
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
            $product_id = $request -> product_id;
            $favourite = new Favourite;
            $favourite -> user_id = $user -> id;
            $favourite -> product_id = $product_id;
            $favourite -> save();

            $data += [
                'message' => 'added to favourites',
            ];
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
            Favourite::where('user_id', $user -> id)->where('product_id', $product_id)->delete();

            $data += [
                'message' => 'removed from favourites',
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
