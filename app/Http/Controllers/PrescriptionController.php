<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Doctor;
use App\Image;
use App\UserRole;
use App\Prescription;
use App\PrescriptionDe;
use App\Product;
use App\DrPrescription;
use App\TimeTable;
use App\Day;
use App\Pharmacy;
use App\Dosage;
use App\PresDay;


class PrescriptionController extends Controller
{
    public function mobilePresShowAll(Request $request)
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
            $prescriptions = Prescription::where('user_id',$user -> id )->get();
            $prescription = [];


            if($prescriptions->isEmpty()){
                $isFailed = true;
                $errors[] = ['error' => 'no prescriptions yet'];
            }
            else {

                foreach($prescriptions as $pres)
                {
                    //medicine_name
                    $medicine = $pres -> medicine_name;
                    //dosage
                    $dosage = $pres -> dosage ;
                    //start hour
                    //$str_hour = $pres -> start_hour;
                    //frequency
                    $freq = $pres -> frequency;
                    //end date
                    //$eDate = $pre -> end_date;
                    //days in week
                    $pre_days = PresDay::where('prescription_id', $pres -> id)->get();
                    if($pre_days -> isEmpty()){
                        $errors += [
                            'message' => 'can not retrieve prescription days',
                        ];
                    }
                    else{
                        $days=[];
                        foreach($pre_days as $pre_day)
                        {
                            $day_id =  $pre_day -> id ;
                            $day = Day::where('id', $day_id)->first();
                            $days [] = [
                                'name' => $day,
                            ];
                        }
                    }

                    //dosage time
                    $id = $pres -> id ;
                    $dosage_time = Dosage::where('prescription_id' , $id)->get();
                    if($dosage_time -> isEmpty()){
                        $errors += [
                            'message' => 'can not retrieve prescription times',
                        ];
                    }
                    else{
                        $dosage_hours = [];
                        foreach($dosage_time as $hour){
                            $dosage_hours[] = [
                                'hour' => $hour -> dosage_time,
                            ];
                        }
                    }
                    $prescription = [
                        'medicine' => $medicine,
                        'dosage' => $dosage,
                        'frequency' => $freq,
                        'Days'=> $days,
                        'dosage_time' => $dosage_hours,
                    ];
                    $data[] = $prescription;
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

    public function mobileCreatePrescription(Request $request){
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
            $days = $request -> days;
            if($days->isEmpty())
            {
                $isFailed = true;
                $errors[] = ['error' => 'no days choosen'];
            }
            else {
                $prescription = new Prescription;
                $prescription -> medicine_name = $request -> medicine_name;
                $prescription -> dosage = $request -> dosage;
                $prescription -> start_hour = $request -> start_hour;
                $prescription -> end_date = $request -> end_date;
                $prescription -> user_id = $user -> id;
                $prescription -> frequency = $request -> frequency;
                $prescription -> save();

                foreach($days as $day)
                {

                    $prescription_id = $prescription -> id;
                    $prescription_day = new PresDay;
                    $prescription_day -> prescription_id = $prescription_id;
                    $prescription_day -> day_id = $day;
                    $prescription_day -> save();
                }

                $process = $request -> auto;
                if($process == '0'){
                    $hours = $request -> hours;
                    foreach($hours as $hour){
                        $dosages = new Dosage;
                        $dosage -> prescription_id = $prescription -> id;
                        $dosage -> dosage_time = $hour;
                        $dosage -> save();
                    }
                }
                elseif($process == '1'){
                    $interval = 24 / ($request -> frequency);
                    $hour = $request -> start_hour;
                    for($i = 0; $i < ($request -> frequency); $i++){
                        $dosages = new Dosage;
                        $dosage -> prescription_id = $prescription -> id;
                        $dosage -> dosage_time = $hour;
                        $dosage -> save();
                        $hour += $interval;
                    }
                }

                $data += [
                    'success' => 'prescription registered successfully'
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

    public function mobileDeletePrescription(Request $request){
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
            $prescription_id = $request -> prescription_id;
            Dosage::where('prescription_id', $prescription_id)->delete();
            PresDay::where('prescription_id', $prescription_id)->delete();
            Prescription::where('id', $prescription_id)->delete();

            $data += [
                'message' => 'deleted',
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
