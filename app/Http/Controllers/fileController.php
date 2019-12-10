<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\city;
use App\country;
use App\doctor;
use App\gender;
use App\image;
use App\pharmacy;
use App\specialities;
use App\user_role;

class fileController extends Controller
{
    public function show ()
    {
        return response()->download(public_path('hello.jpg'), 'Image');

    }
    public function save(Request $request )
    {
       $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
       $file_name="Image.jpg";
       $path=$request->file('Images')->move(public_path("/"),$file_name);
       $ImageURL=url('/'.$file_name);
       return response()->json(['url'=>$ImageURL],200);
    }
}
