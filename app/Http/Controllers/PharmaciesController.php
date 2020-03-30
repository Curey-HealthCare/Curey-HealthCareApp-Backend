<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function WebShowStatement(Request $request)
    {
        
        //authentication 
        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null)
        {
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        if ($isFailed == false)
        {
            $pharmacy_id = $user -> id;
            $pharmacy = Pharmacy::where('id',$pharmacy_id)->first();
            
            if($pharmacy == null)
            {
                $isFailed = true;
                $errors += [
                    'pharmacy' => 'error'
                ];
            }
            else
            {
              $pharma=[];
              //pharmacy name 
              $pharmacy_name = $user -> full_name;  
              //no of reviews 
              //ratings
              $overall_rating = 0;
              $rate = 0;
              $reviewCount = 0;
              $orders = Order::where('pharmacy_id', $pharmacy_id)->get();
              $orders_count = Order::where('pharmacy_id', $pharmacy_id)->count();
                  foreach($orders as $order)
                  {
                      $order_id = $order -> id;
                      $rating = PharmacyRating::where('order_id', $order_id)->first();
                      if($rating == null){
                          continue;
                      }
                      else
                      {
                          $rate += $rating -> rating ;
                      }
                  }
                $overall_rating = $rate / $orders_count;
                $review = $rating -> review;
                $reviewCount = $review ->count();
                //image 
                $image_id = $user -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null)
                {
                    $image_path = $image -> path;
                }
                else
                {
                     $image_path = null;
                }
                $deliveried = $orders-> delivery_type;
                if($deliveried == '1')
              {      
                $id = $orders -> id;
                $U_id = $orders-> user_id ;
                $users = User::where('id',$U_id)->get();
                $user_response=[];
                foreach($users as $us)
                {
                   
                   //name 
                   $name = $us -> full_name;  
                   //address
                   $address = $us -> address;  
                   //rate 
                   //image
                   $image_id = $us -> image_id;
                   $image = Image::where('id', $image_id)->first();
                   if($image != null)
                    {
                      $image_path = $image -> path;
                    }
                   else
                    {
                      $image_path = null;
                    }
                   //order details 
                   $Ord = OrderDetail::where('order_id',$id)->first(); 
                   $product_id = $Ord -> product_id; 
                   $products = Product::where('id',$product_id)->get(); 
                   $product_response=[];
                   foreach($products as $pro)
                   {
                       //name 
                       $pName = $pro -> name;
                       //image 
                       $image_id = $pro -> image_id;
                       $image = Image::where('id', $image_id)->first();
                       if($image != null)
                        {
                          $image_path = $image -> path;
                        }
                        else
                        {
                          $image_path = null;
                        }
                        //quantity 
                        $amount = OrderDetail::where('product_id',$pro -> id)->count(); 

                        $product_response=[
                            'id'=>$pro-> id,
                            'name'=> $pName,
                            'image'=>$image_path,
                            'quantity'=>$amount
                        ];

                   }

                   $user_response=[
                       'id' => $us -> id,
                       'name' => $name ,
                       'address'=> $address,
                       'image'=>$image_path
                        
                   ];
                   $usersRe += [
                    'user' => $user_response,
                    'products' => $product_response
                       ];
                }
              }
              $pharma=[
                  'name' => $pharmacy_name,
                  'raring'=>$overall_rating,
                  'reviews'=>$reviewCount,
                  'image'=>$image_path
              ];
              $data += [
                'pharmacy' => $pharma,
                'users' => $usersRe
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
    public function WebMedication(Request $request)
    {
      //authentication 
      $isFailed = false;
      $data = [];
      $errors =  [];
      $api_token = $request -> api_token;
      $user = null;
      $user = User::where('api_token', $api_token)->first();

      if ($user == null)
      {
          $isFailed = true;
          $errors += [
              'auth' => 'authentication failed'
          ];
      }
      if ($isFailed == false)
      {
          $pharmacy_id = $user -> id;
          $pharmacy = Pharmacy::where('id',$pharmacy_id)->first();
          
          if($pharmacy == null)
          {
              $isFailed = true;
              $errors += [
                  'pharmacy' => 'error'
              ];
          }
          else
          {
            $pharma=[];
            //pharmacy name 
            $pharmacy_name = $user -> full_name;  
            //no of reviews 
            //ratings
            $overall_rating = 0;
            $rate = 0;
            $reviewCount = 0;
            $orders = Order::where('pharmacy_id', $pharmacy_id)->get();
            $orders_count = Order::where('pharmacy_id', $pharmacy_id)->count();
                foreach($orders as $order)
                {
                    $order_id = $order -> id;
                    $rating = PharmacyRating::where('order_id', $order_id)->first();
                    if($rating == null){
                        continue;
                    }
                    else
                    {
                        $rate += $rating -> rating ;
                    }
                }
              $overall_rating = $rate / $orders_count;
              $review = $rating -> review;
              $reviewCount = $review ->count();
              //image 
              $image_id = $user -> image_id;
              $image = Image::where('id', $image_id)->first();
              if($image != null)
              {
                  $image_path = $image -> path;
              }
              else
              {
                   $image_path = null;
              }
              $product_id = ProductPharmacy::where('pharmacy_id',$pharmacy_id)->first();
              $products = Product::where('id',$product_id)->get();
              $product_response = [];
              foreach($products as $pro)
              {
                  //name 
                  $pro_name = $pro -> name;
                  //price
                  $price = $pro -> price ;
                  //amount
                  $quantity = ProductPharmacy::where('product_id',$pro -> id)->count();
                  $product_response=
                  [
                    'id'=> $pro -> id,
                    'name'=>$pro_name,
                    'price'=>$price,
                    'quantity'=> $quantity
                  ];
              }
              $pharma=[
                'name' => $pharmacy_name,
                  'raring'=>$overall_rating,
                  'reviews'=>$reviewCount,
                  'image'=>$image_path  
              ];
              $data += [
                'pharmacy' => $pharma,
                'product' =>  $product_response
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
    public function WebShowRequest(Request $request)
    {

        $isFailed = false;
        $data = [];
        $errors =  [];
        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null)
        {
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        if ($isFailed == false)
        {
            $pharmacy_id = $user -> id;
            $pharmacy = Pharmacy::where('id',$pharmacy_id)->first();
            
            if($pharmacy == null)
            {
                $isFailed = true;
                $errors += [
                    'pharmacy' => 'error'
                ];
            }
            else
            {
              $pharma=[];
              //pharmacy name 
              $pharmacy_name = $user -> full_name;  
              //no of reviews 
              //ratings
              $overall_rating = 0;
              $rate = 0;
              $reviewCount = 0;
              $orders = Order::where('pharmacy_id', $pharmacy_id)->get();
              $orders_count = Order::where('pharmacy_id', $pharmacy_id)->count();
                  foreach($orders as $order)
                  {
                      $order_id = $order -> id;
                      $rating = PharmacyRating::where('order_id', $order_id)->first();
                      if($rating == null){
                          continue;
                      }
                      else
                      {
                          $rate += $rating -> rating ;
                      }
                  }
                $overall_rating = $rate / $orders_count;
                $review = $rating -> review;
                $reviewCount = $review ->count();
                //image 
                $image_id = $user -> image_id;
                $image = Image::where('id', $image_id)->first();
                if($image != null)
                {
                    $image_path = $image -> path;
                }
                else
                {
                     $image_path = null;
                }
                $deliveried = $orders-> delivery_type;
                if($deliveried == '0')
              {      
                $id = $orders -> id;
                $U_id = $orders-> user_id ;
                $users = User::where('id',$U_id)->get();
                $user_response=[];
                foreach($users as $us)
                {
                   
                   //name 
                   $name = $us -> full_name;  
                   //address
                   $address = $us -> address;  
                   //image
                   $image_id = $us -> image_id;
                   $image = Image::where('id', $image_id)->first();
                   if($image != null)
                    {
                      $image_path = $image -> path;
                    }
                   else
                    {
                      $image_path = null;
                    }
                   //order details 
                   $Ord = OrderDetail::where('order_id',$id)->first(); 
                   $product_id = $Ord -> product_id; 
                   $products = Product::where('id',$product_id)->get(); 
                   $product_response=[];
                   foreach($products as $pro)
                   {
                       //name 
                       $pName = $pro -> name;
                       //image 
                       $image_id = $pro -> image_id;
                       $image = Image::where('id', $image_id)->first();
                       if($image != null)
                        {
                          $image_path = $image -> path;
                        }
                        else
                        {
                          $image_path = null;
                        }
                        //quantity 
                        $amount = OrderDetail::where('product_id',$pro -> id)->count(); 

                        $product_response=[
                            'id'=>$pro-> id,
                            'name'=> $pName,
                            'image'=>$image_path,
                            'quantity'=>$amount
                        ];

                   }

                   $user_response=[
                       'id' => $us -> id,
                       'name' => $name ,
                       'address'=> $address,
                       'image'=>$image_path
                        
                   ];
                   $usersRe += [
                    'user' => $user_response,
                    'products' => $product_response
                       ];
                }
              }
              $pharma=[
                  'name' => $pharmacy_name,
                  'raring'=>$overall_rating,
                  'reviews'=>$reviewCount,
                  'image'=>$image_path
              ];
              $data += [
                'pharmacy' => $pharma,
                'users' => $usersRe
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
