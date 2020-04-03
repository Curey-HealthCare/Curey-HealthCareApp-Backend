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
    public function webRead(Reqest $request){
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

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webUpdate(Reqest $request){
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

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
    public function webDelete(Reqest $request){
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

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }
}
