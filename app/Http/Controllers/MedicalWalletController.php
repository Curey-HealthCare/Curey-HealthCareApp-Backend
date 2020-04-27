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
                        $image_path = $radiology_image -> path . '.' .$radiology_image -> extension;
                        $path = public_path($image_path);
                        echo asset($path) . "\n";
                        $image_url = asset($path);
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
                        $image_path = $prescription_image -> path . $prescription_image -> extension;
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
            $file = Storage::disk('local')->put('/radiology/' . $imageName . '.' . $extension, File::get($image));
//            $file = $request->file('image')->storeAs('radiology/', $imageName . '.' . $extension);
//            store image path in database
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
}
