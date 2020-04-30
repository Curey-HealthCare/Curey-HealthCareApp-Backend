<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Radiology;
use App\PrescriptionImage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicalWalletController extends Controller
{
//    For Radiology
    public function webReadRadiology(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $radiologies = Radiology::where('user_id', $user -> id)->get();
            if($radiologies -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'empty' => 'you do not have radiology images stored'
                ];
            }
            else{
                $images = [];
                foreach ($radiologies as $radiology) {
                    $radiology_image = Image::where('id', $radiology -> image_id)->first();
                    if($radiology_image != null){
                        $image_path = Storage::url($radiology_image -> path . '.' .$radiology_image -> extension);
                        $image_url = asset($image_path);
                        $image = [
                            'id' => $radiology -> id,
                            'image' => $image_url,
                            'name' => $radiology -> name,
                        ];
                        $images[] = $image;
                    }
                }
                $data = $images;
            }
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webSaveRadiology(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'IMG_' . time();
            $file = Storage::disk('public')->put('radiology/' . $imageName . '.' . $extension, File::get($image));
            $image_path  = new Image;
            $image_path -> path = 'radiology/' . $imageName;
            $image_path -> extension = $extension;
            if($image_path -> save()){
//                link the image to the user who owns it
                $radiology = new Radiology;
                $radiology -> image_id = $image_path -> id;
                $radiology -> user_id = $user -> id;
                $radiology -> name = $request -> name;
                if($radiology -> save()){
                    $data = [
                        'success' => 'image uploaded successfully'
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

    public function webDeleteRadiology(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $id = $request -> id;
            $radiology = Radiology::where('id', $id)->first();
            if($radiology != null){
                $image_id = $radiology -> image_id;
                Radiology::where('id', $id)->delete();
                $image = Image::where('id', $image_id)->first();
                if(is_file($image -> path)){
                    Storage::delete($image -> path);
                    Image::where('id', $image_id)->delete();
                    $data = [
                        'success' => 'image deleted successfully'
                    ];
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'image' => 'file does not exist'
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

//    For Prescriptions

    public function webReadPrescriptions(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $prescriptions = PrescriptionImage::where('user_id', $user -> id)->get();
            if($prescriptions -> isEmpty()){
                $isFailed = true;
                $errors += [
                    'empty' => 'you do not have prescription images stored'
                ];
            }
            else{
                $images = [];
                foreach ($prescriptions as $prescription) {
                    $prescription_image = Image::where('id', $prescription -> image_id)->first();
                    if($prescription_image != null){
                        $image_path = Storage::url($prescription_image -> path . '.' . $prescription_image -> extension);
                        $image_url = asset($image_path);
                        $image = [
                            'id' => $prescription -> id,
                            'image' => $image_url,
                        ];
                        $images[] = $image;
                    }
                }
                $data = $images;
            }
        }

        $response = [
            'isFailed' => $isFailed,
            'data' => $data,
            'errors' => $errors
        ];

        return response()->json($response);
    }

    public function webSavePrescription(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'IMG_' . time();
            $file = Storage::disk('public')->put('prescription/' . $imageName . '.' . $extension, File::get($image));
            $image_path  = new Image;
            $image_path -> path = 'prescription/' . $imageName;
            $image_path -> extension = $extension;
            if($image_path -> save()){
//                link the image to the user who owns it
                $radiology = new Radiology;
                $radiology -> image_id = $image_path -> id;
                $radiology -> user_id = $user -> id;
                if($radiology -> save()){
                    $data = [
                        'success' => 'image uploaded successfully'
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

    public function webDeletePrescription(Request $request){
        $isFailed = false;
        $data = [];
        $errors =  [];

        $api_token = $request -> api_token;
        $user = null;
        $user = User::where('api_token', $api_token)->first();

        if ($user == null){
            $isFailed = true;
            $errors += [
                'auth' => 'authentication failed'
            ];
        }
        else{
            $id = $request -> id;
            $prescription = PrescriptionImage::where('id', $id)->first();
            if($prescription != null){
                $image_id = $prescription -> image_id;
                PrescriptionImage::where('id', $id)->delete();
                $image = Image::where('id', $image_id)->first();
                if(is_file($image -> path)){
                    Storage::delete($image -> path);
                    Image::where('id', $image_id)->delete();
                    $data = [
                        'success' => 'image deleted successfully'
                    ];
                }
                else{
                    $isFailed = true;
                    $errors += [
                        'image' => 'file does not exist'
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
