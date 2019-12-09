<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
use App\city;
use App\country;
use App\doctor;
use App\gender;
use App\image;
use App\pharmacy;
use App\specialities;
use App\user_role;

class SignupController extends Controller
{
    public function show(){
        $countries = country::all();
        $cities = city::all();
        $genders = gender::all();
        $specialities = specialities::all();
        $user_roles = user_role::all();

        $data = ['countries' => $countries,
            'cities' => $cities,
            'genders' => $genders,
            'specialities' => $specialities,
            'user_roles' => $user_roles];

        $response = ['isFailed' => false,
            'data' => $data,
            'errors' => null];

        return response()->json($response, 200);
    }
}
