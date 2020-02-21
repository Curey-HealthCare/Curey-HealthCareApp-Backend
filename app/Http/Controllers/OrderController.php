<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Pharmacy;
use App\Product;
use App\Image;
use App\UserRole;

class OrderController extends Controller
{
    //page only appears to authenticated user 
    //this user has some orders (check that the order belongs to this user)
    //each pharmacy has its own orders (check that the orders belongs to this pharmacy)
    //show function to display all the orders
    //store function to store new order in storage 
     public function mobileShowOrder(Request $request)
     {     
          //handle errors
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();
         //check authentication
        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }

         //check that  orders belongs to the user 
         if ($isFailed == false){
            $id = $user -> id;
            $orders = Order::where('user_id', $id)->get(); 
           //check the orders belongs to  pharmacy 
           $order_de = []; 
            foreach($orders as $order)
            {   //check that is the specific order
                $ord_id = $order->id ;
                $ord = Order::where('order_id', $ord_id)->get();
                //get the ph_id of orders  
                $ph_id = $ord -> pharmacy_id;
                $pharmacy = Pharmacy::find($ph_id);
                //name of the product 
                $product = Porduct::find('product_name')->where('order_id',$ord_id);
                //check the amount of the order 
                $amount = OrderDetail::where('order_id', $ord_id);
                //to get user address
                $user_address= User::find('user_address')->where('user_id',$id);
                //get the price from product table
                $pr_price = Product::find('price')->where('order_id',$ord_id);
                
                 //ph_id , ord_id , ph_name, ph_add, ord_status, user_add, price , orders 
                $order_de=[
                    'order_id'=>$order->id,
                    'order_name'=>$product->name,
                    'ph_id'=>$pharmacy->id,
                    'pharmacy_name'=>$pharmacy->name,
                    'pharmacy_address'=>$pharmacy->address,
                    //order status 
                    'user_address'=>$user->address,
                    'order_price'=>$pr_price->price
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
 
   

    //store request to store new order 
    public function mobileStoreOrder(Request $request)
    {
       //validate data 
       $this->validate($request,[
        'order_id'=>'required',
        'order_name'=>'required',
        'ph_id'=>'required',
        'pharmacy_name'=>'required',
        'pharmacy_address'=>'required',
        'user_address'=>'required',
        'order_price'=>'required',
    ]);
    $order=Order::create([
        'name'=>$request->name,
        'user_id'=>$user->id,
       ]);
       $pharmacy=Pharmacy::create([
        'id'=>$request->id,
        'name'=>$request->name,
        'address'=>$request->address,
       ]);
       $ord_details=OrderDetail::create([
        'order_id'=>$order->id,
        'product_id'=>$product->id,
        'amount'=>$request->amount,
       ]);
       $users=User::create([
        'address'=>$request->adress,
       ]);
       $product=Product::create([
        'name'=>$request->name,
        'price'=>$request->price,
       ]);
       $order->save();


    }
}
