<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Image;
use App\Doctor;
use App\Timetable;
use App\Day;

class ScheduleController extends Controller
{
    public function webCreate(Request $request){
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
            $newSchedule = $request -> schedule;
            if($newSchedule == []){
                $isFailed = true;
                $errors += [

                ];
            }
            else{
                foreach($newSchedule as $this_day){
                    $day = new TimeTable;
                    $day -> user_id = $user -> id;
                    $day -> day_id = $this_day['day_id'];
                    $day -> from = $this_day['from'];
                    $day -> to = $this_day['to'];
                    $day -> save();
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
    public function webRead(Request $request){
        //authentication
        $isFailed = false;
        $data = [];
        $errors =  [];

        // Global variables
        $days = [];

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
            $existing_schedule = TimeTable::where('user_id', $user -> id)->get();
            if($existing_schedule -> isEmpty()){
                $isFailed = true;
            }
            else{
                foreach($existing_schedule as $day){
                    $the_day = Day::where('id', $day -> day_id)->first();
                    if($the_day != null){
                        $schedule = [
                            'id' => $day -> id,
                            'day' => $the_day -> name,
                            'from' => $day -> from,
                            'to' => $day -> to,
                        ];
                        $days[] = $schedule;
                    }
                }
            }
        }
        if($isFailed == false){
            $data = $days;
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webUpdate(Request $request){
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
            $record_id = $request -> day_id;
            TimeTable::where('id', $record_id)->update([
                'from' => $request -> from,
                'to' => $request -> to,
            ]);
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webDelete(Request $request){
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
            $record_id = $request -> day_id;
            TimeTable::where('id', $record_id)->delete();
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webHomeVisitStatus(Request $request){
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
                Doctor::where('user_id', $user -> id)->update([
                    'offers_callup' => $request -> status,
                ]);
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
