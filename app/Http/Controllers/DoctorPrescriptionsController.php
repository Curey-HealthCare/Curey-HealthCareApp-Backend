<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Image;
use App\Doctor;
use App\Gender;
use App\Appointment;
use App\PrescriptionDe;
use App\DrPrescription;
use App\Product;

class DoctorPrescriptionsController extends Controller
{
    public function webReadAll(Request $request){
        //authentication
        $isFailed = false;
        $data = [];
        $errors =  [];

        // Global variables
        $prescriptions_response = [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 3])->first();
        if($user == null){
            $isFailed = true;
            $errors += [
                'error' => 'authentication failed'
            ];
        }
        else{
            $doctor = Doctor::where('user_id', $user -> id)->first();
            if($doctor != null){
                $appointments = Appointment::where('doctor_id', $doctor -> id)->get();
                if($appointments -> isNotEmpty()){
                    foreach($appointments as $appointment){
                        // get the patient's data
                        $patient = User::where('id', $appointment -> user_id)->first();
                        if($patient != null){
                            $p_image_path = null;
                            $p_image = Image::where('id', $patient -> image_id)->first();
                            if($p_image != null){
                                $image_path = Storage::url($p_image -> path . '.' .$p_image -> extension);
                                $p_image_path = asset($image_path);
                            }
                            else{
                                $p_image_path = asset(Storage::url('default/user.png'));
                            }
                            $prescriptions = DrPrescription::where('appointment_id', $appointment -> id)->get();
                            // echo $prescriptions;
                            if($prescriptions -> isNotEmpty()){
                                foreach($prescriptions as $pres){
                                    $prescription_details = PrescriptionDe::where('prescription_id', $pres -> id)->get();
                                    if($prescription_details -> isNotEmpty()){
                                        $details = [];
                                        foreach($prescription_details as $pro){
                                            $product = Product::where('id', $pro -> product_id)->first();
                                            if($product != null){
                                                $image_path = null;
                                                $image = Image::where('id', $product -> image_id)->first();
                                                if($image != null){
                                                    $image_path = Storage::url($image -> path . '.' .$image -> extension);
                                                    $image_url = asset($image_path);
                                                }
                                                else{
                                                    $image_url = asset(Storage::url('default/product.png'));
                                                }
                                                $item = [
                                                    'name' => $product -> name,
                                                    'image' => $image_url,
                                                    'dosage' => $pro -> dosage,
                                                    'per_week' => $pro -> per_week
                                                ];

                                                $details[] = $item;
                                            }
                                            else{
                                                $isFailed = true;
                                                $errors += ['product'];
                                            }
                                        }
                                        $card = [
                                            'patient' => $patient -> full_name,
                                            'address' => $patient -> address,
                                            'image' => $p_image_path,
                                            'details' => $details,
                                        ];
                                        $prescriptions_response[] = $card;
                                    }
                                    else{
                                        $isFailed = true;
                                        $errors += ['prescription details'];
                                    }
                                }
                            }
                        }
                        else{
                            $isFailed = true;
                            $errors += ['patient'];
                        }
                    }
                }
                else{
                    $isFailed = true;
                    $errors += ['appointments'];
                }
            }
        }

        if($isFailed == false){
            $data = $prescriptions_response;
        }
        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webCreate(Request $request){
        //authentication
        $isFailed = false;
        $data = [];
        $errors =  [];

        // Global variables
        $appointments = [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where(['api_token' => $api_token, 'role_id' => 3])->first();
        if($user == null){
            $isFailed = true;
            $errors += [
                'error' => 'authentication failed'
            ];
        }
        else{
            $doctor = Doctor::where('user_id', $user -> id)->first();
            if($doctor != null){
                $items = $request -> items;
                if($request -> appointment_id != null){
                    if($items != []){
                        $prescription = new DrPrescription;
                        $prescription -> appointment_id = $request -> appointment_id;
                        if($prescription -> save()){
                            foreach($items as $item){
                                $pres_detail = new PrescriptionDe;
                                $pres_detail -> prescription_id = $prescription -> id;
                                $pres_detail -> product_id = $item['product_id'];
                                $pres_detail -> dosage = $item['dosage'];
                                $pres_detail -> per_week = $item['per_week'];
                                $pres_detail -> save();
                            }
                        }
                    }
                    else{
                        $isFailed = true;
                        $errors += [
                            'error' => 'feen elAdwya? هل أنت عبيت؟'
                        ];
                    }
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'error' => 'feeeen el appointment id? هل أنت عبيت؟'
                    ];
                }
            }
        }

        if($isFailed == false){

        }
        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
}
