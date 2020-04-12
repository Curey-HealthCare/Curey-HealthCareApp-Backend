<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;
use App\Image;
use App\Doctor;
use App\Gender;
use App\Appointment;

class DoctorAppointmentsController extends Controller
{
    public function webReadRequests(Request $request){
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
                $new_requests = Appointment::where([
                    ['doctor_id', '=', $doctor -> id],
                    ['appointment_time', '>', Carbon::now()],
                    ['re_examination', '=', 0]
                    ])->get();
                if($new_requests -> isNotEmpty()){
                    foreach($new_requests as $app){
                        // get patient data
                        $patient = User::where('id', $app -> user_id)->first();
                        $p_image_path = null;
                        $p_image = Image::where('id', $patient -> image_id)->first();
                        if($p_image != null){
                            $p_image_path = $p_image -> path;
                        }
                        else{
                            $p_image_path = "default/user.png";
                        }
                        $appointment = [
                            'id' => $app -> id,
                            'patient' => $patient -> full_name,
                            'address' => $patient -> address,
                            'image' => $p_image_path,
                            'timestamp' => $app -> appointment_time,
                            'home_visit' => $app -> is_callup,
                        ];

                        $appointments[] = $appointment;
                    }
                }
            }

        }
        if($isFailed == false){
            $data = $appointments;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webReadReExamination(Request $request){
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
                $new_requests = Appointment::where([
                    ['doctor_id', '=', $doctor -> id],
                    ['appointment_time', '>', Carbon::now()],
                    ['re_examination', '=', 1]
                    ])->get();
                if($new_requests -> isNotEmpty()){
                    foreach($new_requests as $app){
                        // get patient data
                        $patient = User::where('id', $app -> user_id)->first();
                        $p_image_path = null;
                        $p_image = Image::where('id', $patient -> image_id)->first();
                        if($p_image != null){
                            $p_image_path = $p_image -> path;
                        }
                        else{
                            $p_image_path = "default/user.png";
                        }
                        $appointment = [
                            'id' => $app -> id,
                            'patient' => $patient -> full_name,
                            'address' => $patient -> address,
                            'image' => $p_image_path,
                            'timestamp' => $app -> appointment_time,
                            'home_visit' => $app -> is_callup,
                        ];

                        $appointments[] = $appointment;
                    }
                }
            }

        }
        if($isFailed == false){
            $data = $appointments;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webSetReExamination(Request $request){
        //authentication
        $isFailed = false;
        $data = [];
        $errors =  [];

        // Global variables

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
                $doctor_id = $doctor -> id;
                $user_id = $request -> user_id;
                $appointment_time = $request -> appointment_time;
                $is_callup = $request -> is_callup;
                $duration = 1;
                if (Appointment::where(['doctor_id' => $doctor_id, 'appointment_time' => $appointment_time])->count() == 0){
                    $appointment = new Appointment;
                    $appointment -> user_id = $user_id;
                    $appointment -> doctor_id = $doctor_id;
                    $appointment -> appointment_time = $appointment_time;
                    $appointment -> is_callup = $is_callup;
                    $appointment -> duration = $duration;
                    $appointment -> save();

                    $data += [
                        'message' => 'appointment booked successfully',
                    ];
                } else {
                    $errors += [
                        'error' => 'an appointment already exists at this time',
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
}
