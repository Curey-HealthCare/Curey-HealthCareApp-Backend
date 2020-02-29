<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Doctor;
use App\Image;
use App\Speciality;
use App\UserRole;
use App\Appointment;

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
          
         if($appointment->isempty()){
            foreach($appointments as $app)
            {
                //get id of the appointment
                $id = $app->id;
                //get the doctor_id column from app table
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
                    'full_name'=>$user -> full_name,
                    'address' =>$add,
                    'image' => $image_path,
                    'speciality'=> $spec -> name,
                    'app_time' =>$app -> appointment_time,
                    'duration' =>$app -> duration,
                    'fees' => $fees ,
                    'last_checkup' =>$checkup

                ];
                $data []=$appointment;

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
}
