<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Doctor;
use App\Image;
use App\Speciality;
use App\UserRole;
use App\Appointment;
use App\TimeTable;

class AppointmentsController extends Controller
{
    public function mobileAppShowAll(Request $request)
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
            //userid
            $appointments = Appointment::where('user_id',$user -> id )->get();
            $appointment = [];

            if($appointments->isEmpty()){
                $isFailed = true;
                $errors[] = ['error' => 'no appointments yet'];
            }
            else{
                foreach($appointments as $app)
                {
                    //get id of the appointment
                    $id = $app->id;
                    //get the doctor_id
                    $doc_id = $app->doctor_id;
                    $doc = Doctor::where('id',$doc_id)->first();
                    //diplay doctor address
                    $add = $doc->address;
                    //check if the doctor has callup or not
                    $isCallUp = $app ->is_callup;
                    if($isCallUp == 1)
                    {
                        //callup fees
                        $fees = $doc ->callup_fees;

                    }
                    else {

                        //fees
                        $fees = $doc ->fees;

                    }
                    //check if there is re-examin or not
                    $reExamine = $app ->re_examination;
                    if($reExamine==1)
                    {
                    $checkup = $app->last_checkup;
                    }
                    //display doctor speciality
                    $spec_id = $doc ->speciality_id;
                    $spec= Speciality::find($spec_id);
                    //to get name of the doctor
                    $Uid = $doc ->user_id;
                    $user = User::find($Uid);
                    //display doctor image
                    $img_id = $user->image_id;
                    $image = Image::where('id',$img_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    //response
                    $appointment=[
                        'id' => $id ,
                        'full_name'=> $user -> full_name,
                        'address' => $add,
                        'image' => $image_path,
                        'speciality'=> $spec -> name,
                        'app_time' => $app -> appointment_time,
                        'duration' => $app -> duration,
                        'fees' => $fees,
                        'last_checkup' => $app -> last_checkup,
                        'is_callup' => $app -> is_callup,
                        're_exam' => $app -> re_examination,

                    ];
                    $data [] = $appointment;

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

    public function mobileCreateAppointment(Request $request){
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
            $doctor_id = $request -> doctor_id;
            $user_id = $user -> id;
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

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function mobileShowAvailable(Request $request){
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
            // Get the doctor's ID
            $doctor_id = $request -> doctor_id;
            $doctor_data = Doctor::find($doctor_id);
            $doctor_user_id = User::select('id')->where('id', $doctor_data -> user_id)->first() -> id;

            $current_date = new Carbon;
            $current_date = Carbon::now();

            $current_day = $current_date -> dayOfWeek;
            if($current_day == 6){
                $current_day = 1;
            }
            else{
                $current_day = $current_day + 2;
            }

            $doctor_timetable = TimeTable::where('user_id', $doctor_user_id)->get();
            if($doctor_timetable -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'message' => 'this doctor do not have a schedule yet',
                ];
            }
            else{
                $today = null;
                $next_day = null;
                $days_ids = [];
                foreach($doctor_timetable as $doctor_day){
                    if($doctor_day -> day_id == $current_day){
                        $today = $doctor_day;
                    }
                    $days_ids[] = $doctor_day -> day_id;
                }
                $doctor_appointments_today = Appointment::where(['doctor_id' => $doctor_id,])
                    ->whereDate('appointment_time', Carbon::today())->get();
                $appointments_today = [];
                if($doctor_appointments_today -> isNotEmpty()){
                    foreach($doctor_appointments_today as $appointment){
                        $appointments_today[] = $appointment -> appointment_time;
                    }
                }
                $today_id = $today -> day_id;
                $loops = 0;
                $next_doctor_day = null;
                $i = $today_id + 1;
                while($i <= 7){
                    ++$loops;
                    $day = Carbon::today();
                    $day->addDays($loops);
                    if(in_array($i, $days_ids)){
                        $appointments_at_day = Appointment::where('doctor_id', $doctor_id)
                            ->whereDate('appointment_time', $day)->get();
                        $appointments_count = Appointment::where('doctor_id', $doctor_id)
                            ->whereDate('appointment_time', $day)->count();
                        if($appointments_at_day == []){
                            $next_doctor_day = $doctor_day;
                            break;
                        }
                        else{
                            $to = $doctor_day -> to;
                            $from = $doctor_day -> from;
                            $work_hours = (new Carbon($to))->diff(new Carbon($from))->format('%h');
                            $max_appointment_count = $work_hours / 1;
                            if($appointments_count < $max_appointment_count){
                                $next_doctor_day = $doctor_day;
                                break;
                            }
                        }
                    }
                    if($i >= 7){
                        $i = 0;
                    }
                    $i++;
                }

                $next_day = Carbon::today();
                $next_day ->addDays($loops);

                $doctor_appointments_next_day = Appointment::where(['doctor_id' => $doctor_id,])
                    ->whereDate('appointment_time', $next_day)->get();

                $appointments_next_day = [];
                if($doctor_appointments_next_day -> isNotEmpty()){

                    foreach($doctor_appointments_next_day as $appointment){

                        $appointments_next_day[] = $appointment -> appointment_time;
                    }
                }


                $appointments_today_response = [
                    'from' => $today -> from,
                    'to' => $today -> to,
                    'date' => Carbon::today()->toDateString(),
                    'appointments' => $appointments_today,
                ];

                $appointments_next_day_response = [
                    'from' => $next_doctor_day -> from,
                    'to' => $next_doctor_day -> to,
                    'date' => $day->toDateString(),
                    'appointments' => $appointments_next_day,
                ];

                $data = [
                    'today' => $appointments_today_response,
                    'next_day' => $appointments_next_day_response,
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
    //for web

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


    public function webShowAll(Request $request)
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
            //userid
            $appointments = Appointment::where('user_id',$user -> id )->get();
            $appointment = [];

            if($appointments->isEmpty()){
                $isFailed = true;
                $errors[] = ['error' => 'no appointments yet'];
            }
            else{
                foreach($appointments as $app)
                {
                    //get id of the appointment
                    $id = $app->id;
                    //get the doctor_id
                    $doc_id = $app->doctor_id;
                    $doc = Doctor::where('id',$doc_id)->first();
                    //diplay doctor address
                    $add = $doc->address;
                    //check if the doctor has callup or not
                    $isCallUp = $app ->is_callup;
                    if($isCallUp == 1)
                    {
                        //callup fees
                        $fees = $doc ->callup_fees;

                    }
                    else {

                        //fees
                        $fees = $doc ->fees;

                    }
                    //check if there is re-examin or not
                    $reExamine = $app ->re_examination;
                    if($reExamine==1)
                    {
                    $checkup = $app->last_checkup;
                    }
                    //display doctor speciality
                    $spec_id = $doc ->speciality_id;
                    $spec= Speciality::find($spec_id);
                    //to get name of the doctor
                    $Uid = $doc ->user_id;
                    $user = User::find($Uid);
                    //display doctor image
                    $img_id = $user->image_id;
                    $image = Image::where('id',$img_id)->first();
                    if($image != null){
                        $image_path = $image -> path;
                    }
                    else{
                        $image_path = null;
                    }
                    //response
                    $appointment=[
                        'id' => $id ,
                        'full_name'=> $user -> full_name,
                        'address' => $add,
                        'image' => $image_path,
                        'speciality'=> $spec -> name,
                        'app_time' => $app -> appointment_time,
                        'duration' => $app -> duration,
                        'fees' => $fees,
                        'last_checkup' => $app -> last_checkup,
                        'is_callup' => $app -> is_callup,
                        're_exam' => $app -> re_examination,

                    ];
                    $data [] = $appointment;

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
    public function webCreateAppointment(Request $request){
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
            $doctor_id = $request -> doctor_id;
            $user_id = $user -> id;
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

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webShowAvailable(Request $request){
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
            // Get the doctor's ID
            $doctor_id = $request -> doctor_id;
            $doctor_data = Doctor::find($doctor_id);
            $doctor_user_id = User::select('id')->where('id', $doctor_data -> user_id)->first() -> id;

            $current_date = new Carbon;
            $current_date = Carbon::now();

            $current_day = $current_date -> dayOfWeek;
            if($current_day == 6){
                $current_day = 1;
            }
            else{
                $current_day = $current_day + 2;
            }

            $doctor_timetable = TimeTable::where('user_id', $doctor_user_id)->get();
            if($doctor_timetable -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'message' => 'this doctor do not have a schedule yet',
                ];
            }
            else{
                $today = null;
                $next_day = null;
                $days_ids = [];
                foreach($doctor_timetable as $doctor_day){
                    if($doctor_day -> day_id == $current_day){
                        $today = $doctor_day;
                    }
                    $days_ids[] = $doctor_day -> day_id;
                }
                $doctor_appointments_today = Appointment::where(['doctor_id' => $doctor_id,])
                    ->whereDate('appointment_time', Carbon::today())->get();
                $appointments_today = [];
                if($doctor_appointments_today -> isNotEmpty()){
                    foreach($doctor_appointments_today as $appointment){
                        $appointments_today[] = $appointment -> appointment_time;
                    }
                }
                $today_id = $today -> day_id;
                $loops = 0;
                $next_doctor_day = null;
                $i = $today_id + 1;
                while($i <= 7){
                    ++$loops;
                    $day = Carbon::today();
                    $day->addDays($loops);
                    if(in_array($i, $days_ids)){
                        $appointments_at_day = Appointment::where('doctor_id', $doctor_id)
                            ->whereDate('appointment_time', $day)->get();
                        $appointments_count = Appointment::where('doctor_id', $doctor_id)
                            ->whereDate('appointment_time', $day)->count();
                        if($appointments_at_day == []){
                            $next_doctor_day = $doctor_day;
                            break;
                        }
                        else{
                            $to = $doctor_day -> to;
                            $from = $doctor_day -> from;
                            $work_hours = (new Carbon($to))->diff(new Carbon($from))->format('%h');
                            $max_appointment_count = $work_hours / 1;
                            if($appointments_count < $max_appointment_count){
                                $next_doctor_day = $doctor_day;
                                break;
                            }
                        }
                    }
                    if($i >= 7){
                        $i = 0;
                    }
                    $i++;
                }

                $next_day = Carbon::today();
                $next_day ->addDays($loops);

                $doctor_appointments_next_day = Appointment::where(['doctor_id' => $doctor_id,])
                    ->whereDate('appointment_time', $next_day)->get();

                $appointments_next_day = [];
                if($doctor_appointments_next_day -> isNotEmpty()){

                    foreach($doctor_appointments_next_day as $appointment){

                        $appointments_next_day[] = $appointment -> appointment_time;
                    }
                }


                $appointments_today_response = [
                    'from' => $today -> from,
                    'to' => $today -> to,
                    'date' => Carbon::today()->toDateString(),
                    'appointments' => $appointments_today,
                ];

                $appointments_next_day_response = [
                    'from' => $next_doctor_day -> from,
                    'to' => $next_doctor_day -> to,
                    'date' => $day->toDateString(),
                    'appointments' => $appointments_next_day,
                ];

                $data = [
                    'today' => $appointments_today_response,
                    'next_day' => $appointments_next_day_response,
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
