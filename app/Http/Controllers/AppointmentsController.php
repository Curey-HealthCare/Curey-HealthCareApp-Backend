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

                // Get available appointments for first day
                $doctor_appointments_first_day = Appointment::where(['doctor_id' => $doctor_id,])
                    ->whereDate('appointment_time', Carbon::today())->get();
                $first_appointments_count = Appointment::where('doctor_id', $doctor_id)
                    ->whereDate('appointment_time', Carbon::today())->count();
                $skip = 1;
                $first_day = null;
                $appointments_first_day = [];
                if($doctor_appointments_first_day -> isNotEmpty()){
                    $today_id = $today -> day_id;
                    $loops_first = 0;
                    $first_doctor_day = null;
                    $first = $today_id;
                    while($first <= 7){
                        $first_day = new Carbon;
                        $first_day = Carbon::today();
                        $first_day->addDays($loops_first);
                        // echo $first_day . "\n";
                        foreach($doctor_timetable as $doctor_day){
                            if($first == $doctor_day -> day_id){
                                $appointments_at_day = Appointment::where('doctor_id', $doctor_id)
                                    ->whereDate('appointment_time', $first_day)->get();
                                $appointments_count = Appointment::where('doctor_id', $doctor_id)
                                    ->whereDate('appointment_time', $first_day)->count();
                                if($appointments_at_day == []){
                                    $first_doctor_day = $doctor_day;
                                    break 2;
                                }
                                else{
                                    $to = $doctor_day -> to;
                                    $from = $doctor_day -> from;
                                    $work_hours = (new Carbon($to))->diff(new Carbon($from))->format('%h');
                                    $max_appointment_count = $work_hours / 1;
                                    if($appointments_count < $max_appointment_count){
                                        foreach($appointments_at_day as $appointment){
                                            $appointments_first_day[] = $appointment -> appointment_time;
                                        }
                                        $first_doctor_day = $doctor_day;
                                        break 2;
                                    }
                                }
                            }
                        }
                        // echo $first . "\n\n";
                        if($first >= 7){
                            $first = 0;
                        }
                        $first++;
                        $skip++;
                        ++$loops_first;
                    }
                }
                echo $skip;
                // Get available appointments for second day
                $appointments_second_day = [];
                $second_doctor_day = null;
                $second = 0;
                $second_day = null;
                $skip_day = ($today -> id) + $skip;
                $loops_second = $skip - 1;
                while($second <= 7){
                    $second_day = new Carbon;
                    $second_day = Carbon::today();
                    $second_day->addDays($loops_second);

                    foreach($doctor_timetable as $doctor_day2){
                        if($second == $doctor_day2 -> day_id){
                            $appointments_at_day2= Appointment::where('doctor_id', $doctor_id)
                                ->whereDate('appointment_time', $second_day)->get();
                            $appointments_count2 = Appointment::where('doctor_id', $doctor_id)
                                ->whereDate('appointment_time', $second_day)->count();
                            if($appointments_at_day2 == []){
                                $second_doctor_day = $doctor_day2;
                                break 2;
                            }
                            else{
                                $to2 = $doctor_day2 -> to;
                                $from2 = $doctor_day2 -> from;
                                $work_hours2 = (new Carbon($to2))->diff(new Carbon($from2))->format('%h');
                                $max_appointment_count2 = $work_hours2 / 1;
                                if($appointments_count2 < $max_appointment_count2){
                                    foreach($appointments_at_day2 as $appointment2){
                                        $appointments_second_day[] = $appointment2 -> appointment_time;
                                    }
                                    $second_doctor_day = $doctor_day2;
                                    break 2;
                                }
                            }
                        }
                    }
                    $loops_second++;
                    if($second >= 7){
                        $second = 0;
                    }
                    $second++;
                }



                // Build Response
                $appointments_first_response = [
                    'from' => $first_doctor_day -> from,
                    'to' => $first_doctor_day -> to,
                    'date' => $first_day->toDateString(),
                    'appointments' => $appointments_first_day,
                ];

                $appointments_second_response = [
                    'from' => $second_doctor_day -> from,
                    'to' => $second_doctor_day -> to,
                    'date' => $second_day->toDateString(),
                    'appointments' => $appointments_second_day,
                ];

                $data = [
                    'first_day' => $appointments_first_response,
                    'second_day' => $appointments_second_response,
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

                // Get available appointments for first day
                $doctor_appointments_first_day = Appointment::where(['doctor_id' => $doctor_id,])
                    ->whereDate('appointment_time', Carbon::today())->get();
                $first_appointments_count = Appointment::where('doctor_id', $doctor_id)
                    ->whereDate('appointment_time', Carbon::today())->count();
                $skip = 1;
                $first_day = null;
                $appointments_first_day = [];
                if($doctor_appointments_first_day -> isNotEmpty()){
                    $today_id = $today -> day_id;
                    $loops_first = 0;
                    $first_doctor_day = null;
                    $first = $today_id;
                    while($first <= 7){
                        $first_day = new Carbon;
                        $first_day = Carbon::today();
                        $first_day->addDays($loops_first);
                        // echo $first_day . "\n";
                        foreach($doctor_timetable as $doctor_day){
                            if($first == $doctor_day -> day_id){
                                $appointments_at_day = Appointment::where('doctor_id', $doctor_id)
                                    ->whereDate('appointment_time', $first_day)->get();
                                $appointments_count = Appointment::where('doctor_id', $doctor_id)
                                    ->whereDate('appointment_time', $first_day)->count();
                                if($appointments_at_day == []){
                                    $first_doctor_day = $doctor_day;
                                    break 2;
                                }
                                else{
                                    $to = $doctor_day -> to;
                                    $from = $doctor_day -> from;
                                    $work_hours = (new Carbon($to))->diff(new Carbon($from))->format('%h');
                                    $max_appointment_count = $work_hours / 1;
                                    if($appointments_count < $max_appointment_count){
                                        foreach($appointments_at_day as $appointment){
                                            $appointments_first_day[] = $appointment -> appointment_time;
                                        }
                                        $first_doctor_day = $doctor_day;
                                        break 2;
                                    }
                                }
                            }
                        }
                        // echo $first . "\n\n";
                        if($first >= 7){
                            $first = 0;
                        }
                        $first++;
                        $skip++;
                        ++$loops_first;
                    }
                }
                echo $skip;
                // Get available appointments for second day
                $appointments_second_day = [];
                $second_doctor_day = null;
                $second = 0;
                $second_day = null;
                $skip_day = ($today -> id) + $skip;
                $loops_second = $skip - 1;
                while($second <= 7){
                    $second_day = new Carbon;
                    $second_day = Carbon::today();
                    $second_day->addDays($loops_second);

                    foreach($doctor_timetable as $doctor_day2){
                        if($second == $doctor_day2 -> day_id){
                            $appointments_at_day2= Appointment::where('doctor_id', $doctor_id)
                                ->whereDate('appointment_time', $second_day)->get();
                            $appointments_count2 = Appointment::where('doctor_id', $doctor_id)
                                ->whereDate('appointment_time', $second_day)->count();
                            if($appointments_at_day2 == []){
                                $second_doctor_day = $doctor_day2;
                                break 2;
                            }
                            else{
                                $to2 = $doctor_day2 -> to;
                                $from2 = $doctor_day2 -> from;
                                $work_hours2 = (new Carbon($to2))->diff(new Carbon($from2))->format('%h');
                                $max_appointment_count2 = $work_hours2 / 1;
                                if($appointments_count2 < $max_appointment_count2){
                                    foreach($appointments_at_day2 as $appointment2){
                                        $appointments_second_day[] = $appointment2 -> appointment_time;
                                    }
                                    $second_doctor_day = $doctor_day2;
                                    break 2;
                                }
                            }
                        }
                    }
                    $loops_second++;
                    if($second >= 7){
                        $second = 0;
                    }
                    $second++;
                }



                // Build Response
                $appointments_first_response = [
                    'from' => $first_doctor_day -> from,
                    'to' => $first_doctor_day -> to,
                    'date' => $first_day->toDateString(),
                    'appointments' => $appointments_first_day,
                ];

                $appointments_second_response = [
                    'from' => $second_doctor_day -> from,
                    'to' => $second_doctor_day -> to,
                    'date' => $second_day->toDateString(),
                    'appointments' => $appointments_second_day,
                ];

                $data = [
                    'first_day' => $appointments_first_response,
                    'second_day' => $appointments_second_response,
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
