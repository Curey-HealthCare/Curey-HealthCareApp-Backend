<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\City;
use App\Doctor;
use App\Image;
use App\Speciality;
use App\DoctorRating;
use App\Appointment;
use App\Keyword;
use App\Product;
use App\ProductKeyword;
use App\Pharmacy;
use App\ProductPharmacy;
use App\PharmacyRating;
use App\Order;

class SearchController extends Controller
{

    public function mobileSearchDoctors(Request $request){

        $isFailed = false;
        $data = [];
        $errors =  [];

        if($request->has('name')){
            $name = $request -> name;
        }

        $doctors = User::where('full_name', 'LIKE', '%'. $name .'%')->get();
        if($doctors == []){
            $isFailed = true;
            $errors[] = [
                'error' => 'no results'
            ];
        }
        else{
            foreach ($doctors as $doctor_user){

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
