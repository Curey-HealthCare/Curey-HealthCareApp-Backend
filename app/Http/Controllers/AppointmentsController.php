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

        $first_day_app = [];
        $first_day = null;
        $day_1 = null;
        $second_day_app = [];
        $second_day = null;
        $day_2 = null;

        if ($user == null){
            $isFailed = true;
            $errors []  = [ 'auth' => 'authentication failed'];
        }
        else{
            // Get the doctor's ID
            $doctor_id = $request -> doctor_id;
            $doctor_data = Doctor::find($doctor_id);
            if($doctor_data != null){
                $doctor_user_id = User::select('id')->where('id', $doctor_data -> user_id)->first() -> id;
                // details about doctor's schedule in certain days
                // The doctor's schedule
                $doctor_timetables = TimeTable::where('user_id', $doctor_user_id)->orderBy('day_id', 'asc')->get();
                if($doctor_timetables -> isEmpty()){
                    $isFailed = true;
                    $errors += [
                        'message' => 'this doctor do not have a schedule yet',
                    ];
                }
                else{
                    $this_day1 = Carbon::today();
                    // search for the first available 2 days for the next 7 days
                    $m = 1;
                    while($m <= 7){ // if edited edit the comment above ^
                        if($first_day_app == []){
                            $this_day_id = $this_day1 -> dayOfWeek;
                            if($this_day_id == 6){
                                $this_day_id = 1;
                            }
                            else{
                                $this_day_id = $this_day_id + 2;
                            }
                            // get the doctor's schedule of the first available day
                            foreach($doctor_timetables as $doctor_timetable){
                                if($this_day_id == $doctor_timetable -> day_id){
                                    $this_day_appointments = Appointment::where(['doctor_id' => $doctor_id])
                                        ->whereDate('appointment_time', $this_day1)->get();
                                    $this_day_appointments_no = $this_day_appointments->count();
                                    $from = Carbon::parse( $doctor_timetable -> from);
                                    $to = Carbon::parse( $doctor_timetable -> to);
                                    // each appointment is estimated to last 1 Hour
                                    $appointments_no = $to->diffInHours($from);
                                    if($this_day_appointments -> isNotEmpty()){
                                        if($this_day_appointments_no < $appointments_no){
                                            $time = $this_day1->addHours($from -> hour);
                                            for ($i = 0; $i < $appointments_no; $i++){
                                                //  Check if the doctor has an appointment in the time specified, if not, adds the record
                                                if (Appointment::where(['doctor_id' => $doctor_id, 'appointment_time' => $time])->count() == 0){
                                                    $first_day_app[] = $time -> toTimeString();
                                                }
                                                ($time)->addHours(1);
                                            }
                                            $first_day = $doctor_timetable;
                                            $day_1 = $this_day1;
                                        break 2;
                                        }
                                        else{
                                        break;
                                        }
                                    }
                                    else{
                                        // this means that this day is empty
                                        $time = $this_day1->addHours($from -> hour);
                                        for ($i = 0; $i < $appointments_no; $i++){
                                            $first_day_app[] = $time -> toTimeString();
                                            ($time)->addHours(1);
                                        }
                                        $first_day = $doctor_timetable;
                                        $day_1 = $this_day1;
                                    break 2;
                                    }
                                }
                            }
                            $this_day1->addDays(1);
                        }
                        if($first_day_app != []){
                        break;
                        }
                        $m++;
                    }

                    $this_day2 = Carbon::today();
                    $this_day2->addDays(1);
                    $n = 1;

                    while($n <= 7){
                        if($first_day_app != []){
                            $this_day_id = $this_day2 -> dayOfWeek;
                            if($this_day_id == 6){
                                $this_day_id = 1;
                            }
                            else{
                                $this_day_id = $this_day_id + 2;
                            }
                            // Get the doctor's schedule of the second available day
                            foreach($doctor_timetables as $doctor_timetable2){
                                if($this_day_id == $doctor_timetable2 -> day_id){
                                    $this_day_appointments2 = Appointment::where(['doctor_id' => $doctor_id])
                                        ->whereDate('appointment_time', $this_day2)->get();
                                    $this_day_appointments_no2 = $this_day_appointments2->count();
                                    $from2 = Carbon::parse( $doctor_timetable2 -> from);
                                    $to2 = Carbon::parse( $doctor_timetable2 -> to);
                                    // each appointment is estimated to last 1 Hour
                                    $appointments_no2 = $to2->diffInHours($from2);
                                    if($this_day_appointments2 -> isNotEmpty()){
                                        if($this_day_appointments_no2 < $appointments_no2){
                                            $time2 = $this_day2->addHours($from2 -> hour);
                                            for ($i = 0; $i < $appointments_no2; $i++){
                                                //  Check if the doctor has an appointment in the time specified, if not, adds the record
                                                if (Appointment::where(['doctor_id' => $doctor_id, 'appointment_time' => $time2])->count() == 0){
                                                    $second_day_app[] = $time2 -> toTimeString();
                                                }
                                                ($time2)->addHours(1);
                                            }
                                            $second_day = $doctor_timetable2;
                                            $day_2 = $this_day2;
                                        break 2;
                                        }
                                        else{
                                        break;
                                        }
                                    }
                                    else{
                                        // this means that this day is empty
                                        $time2 = $this_day2->addHours($from2 -> hour);
                                        for ($i = 0; $i < $appointments_no2; $i++){
                                            $second_day_app[] = $time2 -> toTimeString();
                                            ($time2)->addHours(1);
                                        }
                                        $second_day = $doctor_timetable2;
                                        $day_2 = $this_day2;
                                    break 2;
                                    }
                                }
                            }
                            $this_day2->addDays(1);
                        }
                        if($second_day_app != []){
                        break;
                        }
                        $n++;
                    }
                    if(($first_day_app == []) && ($second_day_app == [])){
                        $isFailed = true;
                        $errors += [
                            'error' => 'this doctor does not have available appointments for the next 7 days',
                        ];
                    }
                }
            }
            else{
                $isFailed = true;
                $errors += [
                    'message' => 'this is not a doctor, ya 3omar ya "ZAKI"',
                ];
            }
        }

        if($isFailed == false){
            $first_day_data = [
                'from' => $first_day -> from,
                'to' => $first_day -> to,
                'day' => $day_1 -> toDateString(),
                'available' => $first_day_app,
            ];
            $second_day_data = [
                'from' => $second_day -> from,
                'to' => $second_day -> to,
                'day' => $day_2 -> toDateString(),
                'available' => $second_day_app,
            ];
            $data = [
                'first_day' => $first_day_data,
                'second_day' => $second_day_data,
            ];
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

        $first_day_app = [];
        $first_day = null;
        $day_1 = null;
        $second_day_app = [];
        $second_day = null;
        $day_2 = null;

        if ($user == null){
            $isFailed = true;
            $errors []  = [ 'auth' => 'authentication failed'];
        }
        else{
            // Get the doctor's ID
            $doctor_id = $request -> doctor_id;
            $doctor_data = Doctor::find($doctor_id);
            if($doctor_data != null){
                $doctor_user_id = User::select('id')->where('id', $doctor_data -> user_id)->first() -> id;
                // details about doctor's schedule in certain days
                // The doctor's schedule
                $doctor_timetables = TimeTable::where('user_id', $doctor_user_id)->orderBy('day_id', 'asc')->get();
                if($doctor_timetables -> isEmpty()){
                    $isFailed = true;
                    $errors += [
                        'message' => 'this doctor do not have a schedule yet',
                    ];
                }
                else{
                    $this_day1 = Carbon::today();
                    // search for the first available 2 days for the next 7 days
                    $m = 1;
                    while($m <= 7){ // if edited edit the comment above ^
                        if($first_day_app == []){
                            $this_day_id = $this_day1 -> dayOfWeek;
                            if($this_day_id == 6){
                                $this_day_id = 1;
                            }
                            else{
                                $this_day_id = $this_day_id + 2;
                            }
                            // get the doctor's schedule of the first available day
                            foreach($doctor_timetables as $doctor_timetable){
                                if($this_day_id == $doctor_timetable -> day_id){
                                    $this_day_appointments = Appointment::where(['doctor_id' => $doctor_id])
                                        ->whereDate('appointment_time', $this_day1)->get();
                                    $this_day_appointments_no = $this_day_appointments->count();
                                    $from = Carbon::parse( $doctor_timetable -> from);
                                    $to = Carbon::parse( $doctor_timetable -> to);
                                    // each appointment is estimated to last 1 Hour
                                    $appointments_no = $to->diffInHours($from);
                                    if($this_day_appointments -> isNotEmpty()){
                                        if($this_day_appointments_no < $appointments_no){
                                            $time = $this_day1->addHours($from -> hour);
                                            for ($i = 0; $i < $appointments_no; $i++){
                                                //  Check if the doctor has an appointment in the time specified, if not, adds the record
                                                if (Appointment::where(['doctor_id' => $doctor_id, 'appointment_time' => $time])->count() == 0){
                                                    $first_day_app[] = $time -> toTimeString();
                                                }
                                                ($time)->addHours(1);
                                            }
                                            $first_day = $doctor_timetable;
                                            $day_1 = $this_day1;
                                        break 2;
                                        }
                                        else{
                                        break;
                                        }
                                    }
                                    else{
                                        // this means that this day is empty
                                        $time = $this_day1->addHours($from -> hour);
                                        for ($i = 0; $i < $appointments_no; $i++){
                                            $first_day_app[] = $time -> toTimeString();
                                            ($time)->addHours(1);
                                        }
                                        $first_day = $doctor_timetable;
                                        $day_1 = $this_day1;
                                    break 2;
                                    }
                                }
                            }
                            $this_day1->addDays(1);
                        }
                        if($first_day_app != []){
                        break;
                        }
                        $m++;
                    }

                    $this_day2 = Carbon::today();
                    $this_day2->addDays(1);
                    $n = 1;

                    while($n <= 7){
                        if($first_day_app != []){
                            $this_day_id = $this_day2 -> dayOfWeek;
                            if($this_day_id == 6){
                                $this_day_id = 1;
                            }
                            else{
                                $this_day_id = $this_day_id + 2;
                            }
                            // Get the doctor's schedule of the second available day
                            foreach($doctor_timetables as $doctor_timetable2){
                                if($this_day_id == $doctor_timetable2 -> day_id){
                                    $this_day_appointments2 = Appointment::where(['doctor_id' => $doctor_id])
                                        ->whereDate('appointment_time', $this_day2)->get();
                                    $this_day_appointments_no2 = $this_day_appointments2->count();
                                    $from2 = Carbon::parse( $doctor_timetable2 -> from);
                                    $to2 = Carbon::parse( $doctor_timetable2 -> to);
                                    // each appointment is estimated to last 1 Hour
                                    $appointments_no2 = $to2->diffInHours($from2);
                                    if($this_day_appointments2 -> isNotEmpty()){
                                        if($this_day_appointments_no2 < $appointments_no2){
                                            $time2 = $this_day2->addHours($from2 -> hour);
                                            for ($i = 0; $i < $appointments_no2; $i++){
                                                //  Check if the doctor has an appointment in the time specified, if not, adds the record
                                                if (Appointment::where(['doctor_id' => $doctor_id, 'appointment_time' => $time2])->count() == 0){
                                                    $second_day_app[] = $time2 -> toTimeString();
                                                }
                                                ($time2)->addHours(1);
                                            }
                                            $second_day = $doctor_timetable2;
                                            $day_2 = $this_day2;
                                        break 2;
                                        }
                                        else{
                                        break;
                                        }
                                    }
                                    else{
                                        // this means that this day is empty
                                        $time2 = $this_day2->addHours($from2 -> hour);
                                        for ($i = 0; $i < $appointments_no2; $i++){
                                            $second_day_app[] = $time2 -> toTimeString();
                                            ($time2)->addHours(1);
                                        }
                                        $second_day = $doctor_timetable2;
                                        $day_2 = $this_day2;
                                    break 2;
                                    }
                                }
                            }
                            $this_day2->addDays(1);
                        }
                        if($second_day_app != []){
                        break;
                        }
                        $n++;
                    }
                    if(($first_day_app == []) && ($second_day_app == [])){
                        $isFailed = true;
                        $errors += [
                            'error' => 'this doctor does not have available appointments for the next 7 days',
                        ];
                    }
                }
            }
            else{
                $isFailed = true;
                $errors += [
                    'message' => 'this is not a doctor, ya Nahla OR ya Zayan',
                ];
            }
        }

        if($isFailed == false){
            $first_day_data = [
                'from' => $first_day -> from,
                'to' => $first_day -> to,
                'day' => $day_1 -> toDateString(),
                'available' => $first_day_app,
            ];
            $second_day_data = [
                'from' => $second_day -> from,
                'to' => $second_day -> to,
                'day' => $day_2 -> toDateString(),
                'available' => $second_day_app,
            ];
            $data = [
                'first_day' => $first_day_data,
                'second_day' => $second_day_data,
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
